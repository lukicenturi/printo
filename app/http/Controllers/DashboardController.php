<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Http\Requests;
use Auth;
use App\User;
use App\Paper;
use App\Promo;
use App\Topup;
use App\Method;
use App\Prints;
use Session;
use Validator;

class DashboardController extends Controller
{
    public function __construct(User $user, Paper $paper, Promo $promo, Topup $topup, Method $method, Prints $print)
    {
        $this->user = $user;
        $this->paper = $paper;
        $this->promo = $promo;
        $this->topup = $topup;
        $this->method = $method;
        $this->print = $print;

    }

    public function getIndex()
    {
        $print = $this->print->where('status', 2)->get();
        return view('home',[
            'data' => $print
        ]);
    }

    public function print()
    {
        $kode = Date('Ymd') . rand(100000, 999999) . Auth::user()->id;
        $paper = Paper::all();
        return view('print', [
            'paper' => $paper,
            'kode' => $kode
        ]);
    }

    public function topup()
    {
        $promo = Promo::all();
        return view('topup', [
            'promo' => $promo
        ]);
    }

    public function buy(Request $request)
    {
        if ($request['choice'] == 'manual') {
            $this->validate($request, [
                'spec-coin' => 'required|numeric',
                'spec-number' => 'required|numeric'
            ], [
                'spec-coin.required' => 'Insert the number of coin',
                'spec-number.required' => 'Insert the number of money',
                'spec-coin.number' => 'Insert the number of coin by number only',
                'spec-number.number' => 'Insert the number of money by number only'
            ]);

            $coin = $request['spec-coin'];
            $price = $coin * 1000;

        } else if ($request['choice'] == 'promo') {
            $this->validate($request, [
                'promo' => 'required'
            ], [
                'promo.required' => 'Choose the promo you want'
            ]);

            $id = $request['promo'];

            $promo = Promo::where('id', $id)->get()[0];
            $coin = $promo['coin'];
            $price = $promo['price'];
        }

        $date = Date('Y-m-d');
        $status = 1;
        $user = Auth::user()->id;
        $params = [
            'date' => $date,
            'id_user' => $user,
            'coin' => $coin,
            'price' => $price,
            'status' => $status
        ];
        $topup = Topup::create($params);
        $id_topup = $topup['id'];
        Session::put('id_topup', $id_topup);
        return redirect('dashboard/pay/' . $id_topup);
    }

    public function pay($id)
    {
        $topup = Topup::where('id', $id)->get()[0];
        $method = Method::all();
        if (Auth::user()->id != $topup['id_user']) {
            return redirect('dashboard')->with('bad', 'You are not authenticated');
        }
        return view('pay', [
            'topup' => $topup,
            'method' => $method
        ]);

    }

    public function postSubmission(Request $request)
    {
        $topup = Topup::all();
        $id_topup = Session::get('id_topup');
        $method = $request['method'];

        $tipe = Method::find($method)['type'];
        $data_topup = Topup::find($id_topup);

        $id_payment = rand() % 10e15;
        $pay = $data_topup['price'];
        if ($tipe != 'not') {
            for ($i = 1; $i < 999; $i++) {
                $data = $topup->where("id_payment", $i);
                if (count($data) == 0) {
                    $id_payment = $i;
                    break;
                }
            }
            $pay = $data_topup['price'] + $id_payment;
        }
        $params = [
            'id_method' => $method,
            'status' => '2',
            'id_payment' => $id_payment,
            'pay' => $pay
        ];

        Topup::find($id_topup)->update($params);

        return redirect('dashboard/submission/' . $id_topup);

    }

    public function getSubmission($id_topup)
    {
        $data = Topup::find($id_topup);

        $pay = $data['price'] + $data['id_payment'];
        return view('submission', [
            'data' => $data,
        ]);
    }

    public function atm()
    {
        return view('atm');
    }

    public function indomaret()
    {
        return view('indomaret');
    }

    public function checkatm(Request $request)
    {
        $to = $request['to'];

        $data = Method::where('rek', $to)->where('type', 'bank')->get();
        if (count($data) == 0) {
            $returnJSON = [
                'status' => '0',
            ];
        } else {
            $atasnama = $data[0]['atasnama'];
            $bank = $data[0]['name'];
            $returnJSON = [
                'status' => '1',
                'atasnama' => $atasnama,
                'bank' => $bank
            ];
        }

        return response()->json($returnJSON);
    }

    public function atmpay(Request $request)
    {
        $to = $request['to'];
        $amount = $request['amount'];
        $price = floor($amount / 1000) * 1000;
        $id_payment = $amount - $price;
        $id_method = Method::where('rek', $to)->get();
        if (count($id_method) == 0) {
            return back('atm')->with('bad', 'Transaction Failed');
        }
        $id_method = $id_method[0]['id'];

        // return $id_payment;
        $topup = Topup::where('id_payment', $id_payment)->where('id_method', $id_method)->where('price', $price)->get();
        if (count($topup) == 0) {
            return redirect('atm')->with('bad', 'Transaction Failed');
        }

        $coin = $topup[0]['coin'];
        $id_user = $topup[0]['id_user'];

        $edittopup = Topup::find($topup[0]['id']);
        $edittopup->fill([
            'status' => '3',
            'id_payment' => NULL
        ]);
        $edittopup->save();

        $a = User::where('id', $id_user)->increment('coin', $coin);
        return redirect('atm')->with('good', 'Transaction Success');
    }

    public function checkindomaret(Request $request)
    {
        $code = $request['code'];

        $data = Topup::where('id_payment', $code)->where("id_method", '3')->get();

        if (count($data) == 0) {
            $returnJSON = [
                'status' => '0',
            ];
        } else {
            $returnJSON = [
                'status' => '1',
                'coin' => $data[0]['coin'],
                'pay' => $data[0]['pay']
            ];
        }

        return response()->json($returnJSON);
    }

    public function indomaretpay(Request $request)
    {
        $code = $request['code'];

        $topup = Topup::where('id_payment', $code)->get()[0];
        $id = $topup['id'];
        $coin = $topup['coin'];
        $id_user = $topup['id_user'];

        $edittopup = Topup::find($id);
        $edittopup->fill([
            'status' => '3',
            'id_payment' => NULL
        ]);
        $edittopup->save();

        $a = User::where('id', $id_user)->increment('coin', $coin);
        return redirect('indomaret')->with('good', 'Transaction Success');

    }

    public function upload(Request $request)
    {
        $file = $request->file('e');
        $kode = $request['kode'];
        $type = $request['type'];
        $all = ['pdf', 'doc', 'docx'];
        foreach ($all as $a) {
            if (file_exists('print/' . $kode . '.' . $a)) {
                unlink('print/' . $kode . '.' . $a);
            }
        }
        $file->move('print/', $kode . "." . $type);
    }

    public function postPrint(Request $request)
    {
        $deliver = $request['deliver'];

        if ($deliver == 'false') {
            $this->validate($request, [
                'e' => 'required|mimes:docx,doc,pdf',
                'kode' => 'required',
                'size' => 'required',
                'copies' => 'required',
            ], [
                'e.mimes' => 'Upload file docx, doc, of pdf only'
            ]);

            $file = $request->file('e');
            $kode = $request['kode'];
            $source = $request['kode'] . "." . $request['type'];
            $original = $file->getClientOriginalName();
            $size = $request['size'];
            $copies = $request['copies'];
            $deliver = 0;
            $address = '';
            $city = '';
            $province = '';
            $postal_code = '';

        } else {
            $this->validate($request, [
                'e' => 'required|mimes:docx,doc,pdf',
                'kode' => 'required',
                'size' => 'required',
                'copies' => 'required',
                'address' => 'required',
                'city' => 'required',
                'province' => 'required',
                'postal_code' => 'required',
            ], [
                'e.mimes' => 'Upload file docx, doc, of pdf only'
            ]);
            $file = $request->file('e');
            $original = $file->getClientOriginalName();
            $kode = $request['kode'];
            $source = $request['kode'] . "." . $request['type'];
            $size = $request['size'];
            $copies = $request['copies'];
            $deliver = 1;
            $address = $request['address'];
            $city = $request['city'];
            $province = $request['province'];
            $postal_code = $request['postal_code'];
        }

        $pages = 5;
        $params = [
            'date' => Date("Y-m-d"),
            'kode' => $kode,
            'original' => $original,
            'source' => $source,
            'size' => $size,
            'copies' => $copies,
            'status' => '1',
            'deliver' => $deliver,
            'address' => $address,
            'city' => $city,
            'province' => $province,
            'postal_code' => $postal_code,
            'id_user' => Auth::user()->id,
            'pages' => $pages,
            'coin' => $pages * $copies * 1,
        ];

        $tes = $this->print->create($params);
        return response()->json('success', 200);
    }

    public function confirm($kode)
    {
        $print = $this->print->where('kode', $kode)->where('id_user', Auth::user()->id)->get();
        if (count($print) == 0) {
            return back()->with('bad', 'You are not authenticated');
        }
        return view('confirm', [
            'print' => $print[0],
            'kode' => $kode
        ]);
    }

    public function postConfirm(Request $request)
    {
        $kode = $request['kode'];
        $print = $this->print->where('kode', $kode);
        $coin = $print->get()[0]['coin'];

        if (User::where('id', Auth::user()->id)->get()[0]['coin'] < $coin) {
            return back()->with('bad', 'Your coin isn\'t enough');
        }

        User::where('id', Auth::user()->id)->decrement('coin', $coin);

        $this->print->where('kode', $kode)->update(['status' => 2]);

        return redirect('dashboard');
    }

    public function accept($id){
        $print = $this->print->find($id);
        $user = Auth::user();
        $param = [
            'status' => 3,
            'id_partner' => 8
        ];

        $print->update($param);
        return redirect('history/print');
    }

    public function done($id){
        $print = $this->print->find($id);

        $param = [
            'status' => $print['deliver'] == '0' ? 5 : 4,
        ];

        $print->update($param);

        return redirect('history/print');
    }

    public function confirmSent($id){
        $print = $this->print->find($id);

        $param = [
            'status' => 5,
        ];

        $print->update($param);

        return redirect('history/print');
    }

    public function confirmPrinted($id){
        $print = $this->print->find($id);

        $param = [
            'status' => 6,
        ];

        User::where('id', $print['id_partner'])->increment('coin', $print['coin'] + ($print['deliver'] * 10));

        $print->update($param);

        return redirect('history/print');
    }

    public function withdraw(){
        return view('withdraw');
    }

    public function postWithdraw(Request $request){
        $user = Auth::user();

        $user->decrement('coin', $request['coin']);

        return redirect('dashboard/withdraw');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers;
use Auth;
use App\Topup;
use App\Method;
use App\Prints;

class HistoryController extends Controller{
	public function __construct(Topup $topup, Method $method, Prints $print){
		$this->topup = $topup;
		$this->method = $method;
		$this->print = $print;
	}
	public function topup(){
		$id = Auth::user()->id;
		
		$topup = $this->topup->where('id_user',$id)->get();
		return view('history-topup',[
			'data'=>$topup
			]);	
	}
	public function print(){
	    $user = Auth::user();
		$userId = $user->id;

		if($user->role == 'USER'){
            $print = $this->print->where("id_user", $userId)->get();
        }else{
		    $print = $this->print->where("id_partner", $userId)->get();
        }

        return view('history-print',[
            'data' => $print,
        ]);
	}
}
?>
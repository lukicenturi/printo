@extends('dashboard')
@section('css1')
    <link rel='stylesheet' type='text/css' href="{{asset('css/payment.css')}}">
@endsection
@section('js1')
    <script type="text/javascript" src="{{asset('js/payment.js')}}"></script>
@endsection
@section('content1')
    <div class='second-container'>
        <h3>WELCOME IN Go-Print</h3>
        <div class='part-group'>
            @if(Auth::user()->role == 'USER')
            <div class="form">
                <div>
                    <h1>What you want to do?</h1>
                    <a href="{{url('dashboard/top-up')}}">
                        <button id='top-up'>TOP UP</button>
                    </a>
                    <a href="{{url('dashboard/print')}}">
                        <button id='print-file'>PRINT FILE</button>
                    </a>
                </div>
            </div>
            @else
            <div class="form">
                <div>
                    <h1>Print Request</h1>
                    <table class='table'>
                        <tr>
                            <th>No</th>
                            <th>Date</th>
                            <th>File</th>
                            <th>Paper Size</th>
                            <th>Copies</th>
                            <th>Deliver</th>
                            <th>Coin Total</th>
                            <th>Action</th>
                        </tr>
                        @foreach($data as $dat)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{Date('d-M-Y', strtotime($dat['date']))}}</td>
                                <td>{{$dat->original}}</td>
                                <td>{{$dat->paper['size']}}</td>
                                <td>{{$dat['copies']}}</td>
                                <td>@if($dat['deliver'] == 0)
                                        No @else Yes @endif</td>
                                <td>{{$dat['coin'] + ($dat['deliver'] * 10)}}</td>
                                <td>
                                    <a href="{{url('dashboard/accept/' . $dat['id'])}}">
                                        <button class="button green">ACCEPT</button>
                                    </a>
                                    <a href="{{url('dashboard/')}}">
                                        <button class="button red">REJECT</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection

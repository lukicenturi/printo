@extends('main')
@section('css')
    <link rel='stylesheet' type='text/css' href="{{asset_custom('css/dashboard.css')}}">
    @yield('css1')
@endsection
@section('js')
    <script type="text/javascript" src="{{asset_custom('js/dashboard.js')}}"></script>
    @yield('js1')
@endsection

@section('content')
    <div class='wrapper'>
        <div class='toggle'>
            <button class='toggle-sidebar'>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class='sidebar' id="sidebar" data-status='open'>
            <div class='head'>
                <div class='icon'>
                    <a href="{{url('/')}}">
                        <img src="{{asset_custom('img/logo.png')}}">
                    </a>
                </div>
            </div>
            <div class='profile'>
                <div class='wrapper-profile'>
                    <div class='profile-image'>
                        <div class='image'>
                            <img src="{{asset_custom('img/profile/'.Auth::user()->img)}}">
                        </div>
                        {{--<div class='setting'>--}}
                            {{--<a href="{{url('dashboard/profile')}}"><span class='glyphicon glyphicon-cog'></span></a>--}}
                        {{--</div>--}}
                    </div>
                    <div class='profile-name'>
                        <span>{{Auth::user()->name}}</span>
                    </div>
                </div>
            </div>
            <div class='coin'>
                <div>Koin Anda:</div>
                <div class='info-coin'>{{Auth::user()->coin}}</div>
            </div>
            @if(Auth::user()->role == 'USER')
                <div class='button-group'>
                    <a href="{{url('dashboard/top-up')}}">
                        <button id='top-up'>TOP UP</button>
                    </a>
                    <a href="{{url('dashboard/print')}}">
                        <button id='print-file'>PRINT FILE</button>
                    </a>
                </div>
                <div class='item-link'>
                    <ul>
                        <a href="{{url('dashboard')}}">
                            <li><span class='glyphicon glyphicon-dashboard'></span> <span>Dashboard</span>
                            </li>
                        </a>
                        <a href="{{url('history/top-up')}}">
                            <li><span class='glyphicon glyphicon-usd'></span> <span>Top Up History</span></li>
                        </a>
                        <a href="{{url('history/print')}}">
                            <li><span class='glyphicon glyphicon-print'></span> <span>Print History</span></li>
                        </a>
                        <a href="{{url('atm')}}">
                            <li><span class='glyphicon glyphicon-modal-window'></span> <span>To ATM</span></li>
                        </a>
                        <a href="{{url('indomaret')}}">
                            <li><span class='glyphicon glyphicon-sunglasses'></span> <span>To Indomaret</span></li>
                        </a>
                    </ul>
                </div>
                @else
                <div class='item-link'>
                    <ul>
                        <a href="{{url('dashboard')}}">
                            <li class=''><span class='glyphicon glyphicon-dashboard'></span> <span>Dashboard</span>
                            </li>
                        </a>
                        <a href="{{url('history/print')}}">
                            <li><span class='glyphicon glyphicon-print'></span> <span>Print History</span></li>
                        </a>
                        <a href="{{url('dashboard/withdraw')}}">
                            <li><span class='glyphicon glyphicon-usd'></span> <span>Withdraw Coin</span></li>
                        </a>
                    </ul>
                </div>
            @endif
        </div>
        <div class='container'>
            @yield('content1')
        </div>
    </div>
@endsection
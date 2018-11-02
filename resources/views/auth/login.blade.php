@extends('main')
@section('css')
	<link rel="stylesheet" type="text/css" href="{{asset('css/login.css')}}">
@endsection
@section('js')
	<script type="text/javascript" src="{{asset('js/login.js')}}"></script>
@endsection

@section('content')
	<div class='container'>
		<div class='brand'>
			<a href="{{url('/')}}"><img src="{{asset('img/logo.png')}}"></a>
		</div>
		<div class='tabs'>
			<a href="{{url('login')}}" class="active">LOGIN</a>
			<hr class='tabs-separator'>
			<a href="{{url('register')}}">REGISTER</a>
		</div>

		<form method = "POST" action="{{url('login')}}">
		{!! csrf_field() !!}	
			<div class="form-group">
				<input type="email" name="email" id="email">
				<label>Email</label>
			</div>
			<div class="form-group">
				<input type="password" name="password" id="password">
				<label>Password</label>
			</div>
			<div class="form-group">
				<button class="button green right">LOGIN</button>
			</div>
		</form>
	</div>
@endsection

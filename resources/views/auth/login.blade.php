@extends('main')
@section('css')
	<link rel="stylesheet" type="text/css" href="{{asset_custom('css/login.css')}}">
@endsection

@section('content')
	<div class='container'>
		<div class='brand'>
			<a href="{{url('/')}}"><img src="{{asset_custom('img/logo.png')}}"></a>
		</div>
		<div class='tabs'>
			<a href="{{url('login')}}" class="active">LOGIN</a>
			<hr class='tabs-separator'>
			<a href="{{url('register')}}">REGISTER</a>
		</div>

		<form method = "POST" action="{{url('login')}}" autocomplete="off">
		{!! csrf_field() !!}	
			<div class="form-group">
				<input type="email" name="email" id="email" value="{{old('email')}}" placeholder=" " autocomplete="off">
				<label>Email</label>
			</div>
			<div class="form-group">
				<input type="password" name="password" id="password" placeholder=" ">
				<label>Password</label>
			</div>
			<div class="form-group">
				<button class="button green right">LOGIN</button>
			</div>
		</form>
	</div>
@endsection

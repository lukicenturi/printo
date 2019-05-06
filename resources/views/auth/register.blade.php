@extends('main')
@section('css')
	<link rel="stylesheet" type="text/css" href="{{asset_custom('css/login.css')}}">
@endsection

@section('content')
	<body>
		<div class='container'>
			<div class='brand'>
				<a href="{{url('/')}}"><img src="{{asset_custom('img/logo.png')}}"></a>
			</div>
			<div class='tabs'>
				<a href="{{url('login')}}">LOGIN</a>
				<hr class='tabs-separator'>
				<a href="{{url('register')}}"  class="active">REGISTER</a>
			</div>
			<form method="POST" url="{{url('register')}}">
			{!! csrf_field() !!}

				<div class="form-group">
					<input type="text" name="name" id="name" value="{{old('name')}}" placeholder=" ">
					<label>Name</label>
				</div>
				<div class="form-group">
					<input type="email" name="email" id="email" value="{{old('email')}}" placeholder=" ">
					<label>Email</label>
				</div>
				<div class="form-group">
					<input type="password" name="password" id="password" placeholder=" ">
					<label>Password</label>
				</div>
				<div class="form-group">
					<input type="password" name="password_confirmation" id="password_confirmation" placeholder=" ">
					<label>Confirm Password</label>
				</div>
				<div class="form-group">
					<input type="text" name="nohp" id="nohp" value="{{old('nophp')}}" placeholder=" ">
					<label>No Telp</label>
				</div>
				<div class="form-group">
					<select name="role" id="role">
						<option value="USER" @if(old('role') == 'USER') selected @endif>User (I want to print my documents)</option>
						<option value="PARTNER" @if(old('role') == 'PARTNER') selected @endif>Partner (I want to lend my printers)</option>
					</select>
					<label>Register As</label>
				</div>
				<div class="form-group">
					<button class="button green right">REGISTER</button>
				</div>
			</form>
		</div>
	</body>
@endsection
@section('message')
	@if(count($errors)>0)
		<div class='alert alert-danger'>
		<a href="#" class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			@foreach($errors->all() as $error)
				{{$error}}<BR>
			@endforeach
		</div>
	@endif
@endsection
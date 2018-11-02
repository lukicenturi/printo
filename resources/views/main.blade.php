<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="initial-scale=1,width=device-width">
		<!-- TITLE PRINTO-->
		<title>Go-Print</title>
		<link rel="icon" href="img/favicon.ico">

		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="{{asset('css/normalize.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('css/fonts.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('css/override.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
		@yield('css')
		<!-- JS -->
		<script type="text/javascript" src="{{asset('js/jquery-min.js')}}"></script>
		<script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/script.js')}}"></script>
		@yield('js')
	</head>
	<body>
	@yield('content')
		<div class='container-message'>
			@if(count($errors)>0)
				<div class='alert alert-danger'>
				<a href="#" class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					@foreach($errors->all() as $error)
						{{$error}}<BR>
					@endforeach
				</div>
			@endif
			@if(Session::has('good'))
				<div class='alert alert-success'>
					<a href="#" class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					{{Session::get('good')}}
				</div>
			@endif
			@if(Session::has('bad'))
				<div class='alert alert-danger'>
					<a href="#" class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					{{Session::get('bad')}}
				</div>
			@endif
		</div>
	</body>
</html>	

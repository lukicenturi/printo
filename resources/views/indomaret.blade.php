@extends('dashboard')
@section('css1')
<link rel='stylesheet' type='text/css' href="{{asset('css/atm.css')}}">
@endsection
@section('js1')
<script type="text/javascript" src="{{asset('js/indomaret.js')}}"></script>
@endsection
@section('content1')
	<div class='second-container'>
		<h3>WELCOME IN INDOMARET</h3>
		<div class='part-group'>
			<form nosubmit>
			<meta name='_token' content='{!! csrf_token() !!}'>
			<input type='hidden' value="{{url('checkindomaret')}}" id='redirect'>
			<input type='hidden' value="{{url('indomaretpay')}}" id='indomaretpay'>
				<div class='payment-method'>
					<h4>Pay By Indomaret</h4>
					<div class='form-money'>
						<label for='code'> Code : </label><br>
						<input type='text' name='code' id='code'><BR>
					</div>
					<div class='button-next ofauto'>
						<button name='transfer' class='right' id='transfer'>SEARCH</button>
					</div>
				</div>
			</div>
		</form>
	</div>
@endsection		

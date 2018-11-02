@extends('dashboard')
@section('css1')
<link rel='stylesheet' type='text/css' href="{{asset('css/atm.css')}}">
@endsection
@section('js1')
<script type="text/javascript" src="{{asset('js/atm.js')}}"></script>
@endsection
@section('content1')
	<div class='second-container'>
		<h3>ATM</h3>
		<div class='part-group'>
			<form nosubmit>
			<meta name='_token' content='{!! csrf_token() !!}'>
			<input type='hidden' value="{{url('checkatm')}}" id='redirect'>
			<input type='hidden' value="{{url('atmpay')}}" id='atmpay'>
				<div class='payment-method'>
					<h4>Transfer Money</h4>
					<div class='form-money'>
						<label for='to'> To : </label><br>
						<input type='text' name='to' id='to'><BR>
						<label for='amount'> Amount : </label><br>
						<input type='number' name='amount' id='amount' value="0">
					</div>
					<div class='button-next ofauto'>
						<button name='transfer' class='right' id='transfer'>TRANSFER</button>
					</div>
				</div>
			</div>
		</form>
	</div>
@endsection		

@extends('dashboard')
@section('css1')
<link rel='stylesheet' type='text/css' href="{{asset('css/confirm.css')}}">
@endsection
@section('js1')
<script type="text/javascript" src="{{asset('js/confirm.js')}}"></script>
@endsection
@section('content1')
	<div class='second-container'>
		<h3>PRINT CONFIRMATION</h3>
		<div class='part-group'>
			<form action="{{url('dashboard/confirm')}}" method="post">
			{!! csrf_field() !!}
				<div class='payment-method'>
					<h4>Payment Detail</h4>
					<div class='payment-group'>
						<table class='table'>
						<input type='hidden' name='kode' value="{{$kode}}">
							<tr>
								<td colspan='2'>Paper Size</td>
								<td><strong>{{$print->paper['size']}}</strong></td>
							</tr>
							<tr>
								<td colspan='2'>Copies</td>
								<td><strong>{{$print['copies']}}</strong></td>
							</tr>
							<tr>
								<td>Pages</td>
								<td>{{$print['pages']}} pages x 1 coin</td>
								<td>{{$print['pages'] * 1}} coin / copies</td>
							</tr>
							<tr>
								<td>Copies</td>
								<td>{{$print['copies']}} copies x {{$print['pages'] * 1}} coin</td>
								<td>{{$print['coin']}} coin</td>
							</tr>
							<tr>
								<td colspan='2'>Delivery</td>
								<td>@if($print['deliver'] == 0) 0 coin @else 10 coin @endif</td>
							</tr>
							<tr>
								<td colspan='2'>Total</td>
								<td><div class='gold'>@if($print['deliver']==0) {{$print['coin'] }} @else {{$print['coin'] + 10}} @endif coin</div></td>
							</tr>
						</table>
					</div>
					<div class='button-next ofauto'>
						<button name='next' class='right'>NEXT</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection		

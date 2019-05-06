@extends('dashboard')
@section('css1')
<link rel='stylesheet' type='text/css' href="{{asset_custom('css/payment.css')}}">
@endsection
@section('js1')
<script type="text/javascript" src="{{asset_custom('js/payment.js')}}"></script>
@endsection
@section('content1')
	<div class='second-container'>
		<h3>PAYMENT DETAIL</h3>
		<div class='part-group'>
			<form>
				<div class="big">
					{!! csrf_field() !!}	
						@if($data->method['type'] != 'not')
							<table>
								<tbody>
									<tr>
										<td colspan="2">To complete the transaction, finish this payment:</td>
									</tr>
									<tr>
										<td>Amount</td>
										<td><b>Rp{{number_format($data['pay'])}}</b></td>
									</tr>
									<tr>
										<td>Bank:</td>
										<td><b>{{$data->method['name']}}</b></td>
									</tr>
									<tr>
										<td>In the name of :</td>
										<td><b>{{$data->method['atasnama']}}</b></td>
									</tr><tr>
										<td>Account Number :</td>
										<td><b>{{$data->method['rek']}}</b></td>
									</tr>

								</tbody>
							</table>
						@else
							<table>
								<tbody>
									<tr>
										<td colspan="2">Pay at Indomaret</td>
									</tr>
									<tr>
										<td>Amount: </td>
										<td><b>Rp{{number_format($data['pay'])}}</b></td>
									</tr>
									<tr>
										<td>Show this code to the cashier:</td>
										<td><b>{{$data->method['rek']}}{{$data['id_payment']}}</b></td>
									</tr>
									<tr>
										<td>For Payment:</td>
										<td><b>Go-Print Coin</b></td>
									</tr>
								</tbody>
							</table>
						@endif
				</div>
			</form>
		</div>
	</div>
@endsection		

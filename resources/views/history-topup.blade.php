@extends('dashboard')
@section('css1')
<link rel='stylesheet' type='text/css' href="{{asset('css/payment.css')}}">
@endsection
@section('js1')
<script type="text/javascript" src="{{asset('js/payment.js')}}"></script>
@endsection
@section('content1')
	<div class='second-container'>
		<h3>LIST TOPUP</h3>
		<div class='part-group'>
			<form>
			<div>
				<table class='table'>
					<tr>
						<th>No</th>
						<th>Date</th>
						<th>Method</th>
						<th>Coin</th>
						<th>Price</th>
						<th>Status</th>
					</tr>
					@foreach($data as $dat)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{Date('d-M-Y', strtotime($dat['date']))}}</td>
							<td>{{$dat->method['name']}}</td>
							<td>{{$dat['coin']}}</td>
							<td>{{$dat['price']}}</td>
							<td>
							@if($dat['status'] == 1)
								<a href="{{url('dashboard/pay/'.$dat['id'])}}">Select payment method...</a>
							@elseif($dat['status'] == 2)
								<a href="{{url('dashboard/submission/'.$dat['id'])}}">See submission...</a>
							@else
								Paid
							@endif
							</td>
						</tr>
					@endforeach
				</table>
				</div>
			</form>
		</div>
	</div>
@endsection			

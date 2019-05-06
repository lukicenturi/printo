@extends('dashboard')
@section('css1')
<link rel='stylesheet' type='text/css' href="{{asset_custom('css/topup.css')}}">
@endsection
@section('js1')
<script type="text/javascript" src="{{asset_custom('js/topup.js')}}"></script>
@endsection
@section('content1')
	<div class='second-container'>
		<h3> TOP UP</h3>
		<div class='part-group'>
			<form action="{{url('dashboard/buy')}}" method="POST">
			{!! csrf_field() !!}
				<div class='number'>
				<h4>Specify the number of coins</h4>
					<div class='choice'>
						<div class='manual col-sm-7'>
 							<input type='radio' name='choice' id='manual' checked value='manual'><label for='manual'>Input the number of coin manually</label>
 							<div class='manual-wrapper'>
 								<div class='col-sm-6'>	
 									<div class='group-coin'>
 										<input type='number' name='spec-coin' id='spec-coin' placeholder=1>
 										<label for="spec-coin">Coins</label>
 									</div>
 									<div class='group-price'>
 										<input type='number' name='spec-number' placeholder=1000 id='spec-number'>
 										<label for='spec-number'>Rp</label>
 									</div>
 								</div>
 								<div class='whiter' id='white-manual'></div>
 							</div>
						</div>
						<div class='promo col-sm-5'>
							<input type='radio' name='choice' id='promo' value='promo'><label for='promo'>Use the promo</label>
							<div class='promo-wrapper'>
								<select name='promo'>
									<option value=""> Choose the promo</option>
										@foreach($promo as $pro)
										<option id="{{$pro['id']}}" value="{{$pro['id']}}">
											{{$pro['label']}} ( {{$pro['coin']}} coin = Rp{{number_format($pro['price'])}} )
										@endforeach
								</select>
 								<div class='whiter' id='white-promo'></div>
							</div>	
						</div>
					</div>
					<div class='button-buy'>
						<button name='buy' class='right'>BUY</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection		

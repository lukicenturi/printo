@extends('dashboard')
@section('css1')
<link rel='stylesheet' type='text/css' href="{{asset('css/payment.css')}}">
@endsection
@section('js1')
<script type="text/javascript" src="{{asset('js/payment.js')}}"></script>
@endsection
@section('content1')
	<div class='second-container'>
		<h3>PAYMENT</h3>
		<div class='part-group'>
			<form action="{{url('dashboard/submission')}}" method="post">
			{!! csrf_field() !!}
				<div class='payment-method'>
					<h4>Select Payment Method</h4>
					<div class='payment-group'>
						@foreach($method as $met)
							<label for="a-{{$met['id']}}">
								<div class='col-sm-6 payment'>
									<div class='wrapper-radio'>
										<input type='radio' value="{{$met['id']}}" id="a-{{$met['id']}}" name='method' @if($loop->index == 0) checked @endif>
									</div>
									<div class='wrapper-name'>
										<span>{{$met['name']}}</span><BR>
										<img src="{{asset('img/payment/'.$met['picture'])}}">
									</div>
								</div>
							</label>
						@endforeach
					</div>
					<div class='button-next ofauto'>
						<button name='next' class='right'>NEXT</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection		

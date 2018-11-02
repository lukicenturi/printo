@extends('dashboard')
@section('css1')
<link rel='stylesheet' type='text/css' href="{{asset('css/payment.css')}}">
@endsection
@section('js1')
<script type="text/javascript" src="{{asset('js/payment.js')}}"></script>
@endsection
@section('content1')
	<div class='second-container'>
		<h3>LIST PRINT</h3>
		<div class='part-group'>
			<div class="form">
			@if(Auth::user()['role'] == 'USER')
				<div>
					<table class='table'>
						<tr>
							<th>No</th>
							<th>Date</th>
							<th>File</th>
							<th>Paper Size</th>
							<th>Copies</th>
							<th>Deliver</th>
							<th>Coin Total</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
						@foreach($data as $dat)

							<tr>
								<td>{{$loop->iteration}}</td>
								<td>{{Date('d-M-Y', strtotime($dat['date']))}}</td>
								<td>{{$dat->original}}</td>
								<td>{{$dat->paper['size']}}</td>
								<td>{{$dat['copies']}}</td>
								<td>@if($dat['deliver'] == 0)
								No @else Yes @endif</td>
								<td>{{$dat['coin'] + ($dat['deliver'] * 10)}}</td>
								<td style="max-width: 200px;">
								@if($dat['status'] == 1)
									<a href="{{url('dashboard/confirm/'.$dat['kode'])}}">Confirm Print</a>
								@elseif($dat['status'] == 2)
									IN PROCESS
								@elseif($dat['status'] == 3)
									Accepted By {{$dat->partner['name']}}
								@elseif($dat['status'] == 4)
									Printing Done
								@elseif($dat['status'] == 5)
									@if($dat['deliver'] == 0)
										Take The Document At Jalan K.H. Syahdan Gg. Keluarga No. 36, Jakarta Barat, Jakarta
									@else
										Sending To Your Address
									@endif
								@elseif($dat['status'] == 6)
									DONE
								@endif
								</td>
								<td>
									@if($dat['status'] == 5)
										<a href="{{url('dashboard/confirmPrinted/'. $dat['id'])}}">
											<button class="button green">Confirm Printed / Sent</button>
										</a>
									@endif
								</td>
							</tr>
						@endforeach
					</table>
				</div>
				@else
				<div>
					<table class='table'>
						<tr>
							<th>No</th>
							<th>Date</th>
							<th>File</th>
							<th>Paper Size</th>
							<th>Copies</th>
							<th>Deliver</th>
							<th>Coin Total</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
						@foreach($data as $dat)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>{{Date('d-M-Y', strtotime($dat['date']))}}</td>
								<td>{{$dat->original}}</td>
								<td>{{$dat->paper['size']}}</td>
								<td>{{$dat['copies']}}</td>
								<td>@if($dat['deliver'] == 0)
										No @else Yes @endif</td>
								<td>{{$dat['coin'] + ($dat['deliver'] * 10)}}</td>
								<td style="width: 200px;">
									@if($dat['status'] == 1)
										<a href="{{url('dashboard/confirm/'.$dat['kode'])}}">Confirm Print</a>
									@elseif($dat['status'] == 2)
										IN PROCESS
									@elseif($dat['status'] == 3)
										Print Document
									@elseif($dat['status'] == 4)
										Send Document To Binus University Kampus Anggrek Ruangan 711B
									@elseif($dat['status'] == 5)
										Waiting User Confirmation
									@elseif($dat['status'] == 6)
										DONE
									@endif
								</td>
								<td>
									@if($dat['status'] == 3)
									<a href="{{url('print/'. $dat['source'])}}" target="_blank">
										<button class="button black">Download Document</button>
									</a>
									<a href="{{url('dashboard/done/'. $dat['id'])}}">
										<button class="button ghost green">Confirm Done</button>
									</a>
									@elseif($dat['status'] == 4)
									<a href="{{url('dashboard/confirmSent/'. $dat['id'])}}">
										<button class="button ghost green">Confirm Sent</button>
									</a>
									@endif
								</td>
							</tr>
						@endforeach
					</table>
				</div>
				@endif
			</div>
		</div>
	</div>
@endsection			

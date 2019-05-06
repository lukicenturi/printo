@extends('main')
@section('content')
		<header>
			@include('navbar')
		</header>
		<div class="section" id="banner">
			<div class="container">
				<div class="col-sm-6 caption">
					<h1>What is Go-Print?</h1>
					<p>This is a new solution<br> of online printing</p>
					<button class="button ghost rounded green" scroll-target="#after-banner">START NOW</button>
				</div>
				<div class="col-sm-6 image">
					<div class="banner-image">
						<img src="{{asset_custom('img/banner-image.png')}}">
					</div>
				</div>
			</div>
			<div class="next-section">
				<button class="chevron-down" scroll-target="#after-banner">
					<div>
					</div>
					<div>
					</div>
				</button>
			</div>
		</div>
		<div class="section" id="after-banner">
			<div class="container">
				<div>
					<div class="image">
						<img src="{{asset_custom('img/register.png')}}">
					</div>
					<div class="caption">
						<h1>Register at Go-Print now</h1>
						<p>Immediately register at Go-Print to start printing your file and get a variety of attractive promotions</p>
						<a href="{{url('register')}}"><button class="button ghost green">REGISTER</button></a>
						<a href="{{url('login')}}"><button class="button black">LOGIN</button></a>
					</div>
				</div>
				<div>	
					<div class="image">
						<img src="{{asset_custom('img/print.png')}}">
					</div>
					<div class="caption">
						<h1>Print your file now</h1>
						<p>Immediately prove our quality by print your file at Go-Print</p>
						<a href="{{url('dashboard')}}"><button class="button ghost green">START</button></a>
					</div>
				</div>
			</div>
			<div class="next-section">
				<button class="chevron-down" scroll-target="#why">
					<div>
					</div>
					<div>
					</div>
				</button>
			</div>
		</div>
		<div class="section" id="why">
			<div class="container">
				<h1 class="section-header">Why Go-Print?</h1>
				<div class="item-wrapper">
					<figure class="item">
						<img src="{{asset_custom('img/why-1.png')}}">
						<figcaption>24 Hours Service</figcaption>
					</figure>
					<figure class="item">
						<img src="{{asset_custom('img/why-2.png')}}">
						<figcaption>Easy Proccess</figcaption>
					</figure>
					<figure class="item">
						<img src="{{asset_custom('img/why-3.png')}}">
						<figcaption>Affordable Price</figcaption>
					</figure>
					<figure class="item">
						<img src="{{asset_custom('img/why-4.png')}}">
						<figcaption>Fast Response</figcaption>
					</figure>
				</div>
			</div>
			<div class="next-section">
				<button class="chevron-down" scroll-target="#steps">
					<div>
					</div>
					<div>
					</div>
				</button>
			</div>
		</div>
		<div class="section" id="steps">
			<div class="container">
				<div class="steps-caption">
				<p>Printing at Go Print is very easy<BR>
				just by <big>4</big> steps</p>
				</div>
				<div class='item-wrapper'>
					<div class='item'>
						<img src="{{asset_custom('img/step-1.png')}}">
						<div class='number'>1</div>
						<div class='caption'>Register</div>
					</div>
					<div class='item'>
						<img src="{{asset_custom('img/step-2.png')}}">
						<div class='number'>2</div>
						<div class='caption'>Buy Coin</div>
					</div>
					<div class='item'>
						<img src="{{asset_custom('img/step-3.png')}}">
						<div class='number'>3</div>
						<div class='caption'>Upload File</div>
					</div>
					<div class='item'>
						<img src="{{asset_custom('img/step-4.png')}}">
						<div class='number'>4</div>
						<div class='caption'>Take/Send!!</div>
					</div>
				</div>
			</div>
			<div class="next-section">
				<button class="chevron-down" scroll-target="#newsletter">
					<div>
					</div>
					<div>
					</div>
				</button>
			</div>
		</div>
		<div class="section" id="newsletter" style="background-image:url('{{asset_custom('img/newsletter.jpg')}}')">
				<div class='container'>
					<div class='caption'>
						<h1>Newsletter</h1>
						<p>Get the latest info and get a variety of attractive promotions</p>
					</div>
					<div class='field'>
						<input type="email" name="email" id="email" placeholder="Email Address">
						<button class="button green">SUBMIT</button>
					</div>
				</div>
			</div>
		<footer>
			@ Copyright PT. Go-Print
		</footer>
@endsection
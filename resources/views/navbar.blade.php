<nav class="navbar navbar-fixed-top top">
	<div class="container">
		<div class="navbar-header">				
			<a class="navbar-brand" href="#"><img src="{{asset_custom('/img/logo.png')}}" height=50></a>
		</div>
		<ul class="nav navbar-nav navbar-right">
			{{--<li><a href="{{url('about')}}">ABOUT</a></li>--}}
			{{--<li><a href="{{url('faq')}}">FAQ</a></li>--}}

			@if(!Auth::check())
			<li><a href="{{url('login')}}">LOGIN</a></li>
			<li><a href="{{url('register')}}">REGISTER</a></li>
			@else
			<li><a href="{{url('dashboard')}}">DASHBOARD</a></li>
			<li><a href="{{url('logout')}}">LOGOUT</a></li>
			@endif
		</ul>
	</div>
</nav>
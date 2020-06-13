@extends('layouts.frontEndLayout')
	@section('styles')
    	<link rel="stylesheet" href="{{ asset('frontEnd/css/framework.css') }}">
	@endsection

@section('content')

<div id="page-content-scroll" class="header-clear-larger" style="margin-top:-60px;height: 830px;background-image:url({{url('frontEnd/images/background.jpg')}})">

	<div style="padding-top: 40px;">
		<div class="page-login content-boxed content-boxed-padding no-top">
			
			<img class="preload-image login-bg responsive-image no-bottom" src="{{ asset('frontEnd/images/logo-old.jpg') }}" data-src="{{ asset('frontEnd/images/logo-old.jpg') }}" alt="img">

			<form method="POST" action="{{route('users.store') }}">
				@csrf

				<h2 class="uppercase ultrabold full-top no-bottom color-black">Register</h2>

				<input type="hidden" name="from_app" value="from_app">

				<h5 class="half-bottom">Please Enter Your Credentials Below...</h5>

				<div class="page-login-field half-top">
					<i class="fa fa-user"></i>
					<input type="text" name="name" placeholder="name">
					<em>(required)</em>
				</div>

				<div class="page-login-field half-top">
					<i class="fa fa-user"></i>
					<input type="email" name="email" placeholder="email">
					<em>(required)</em>
				</div>

				<input type="hidden" name="user_group_id" value="4">

				<div class="page-login-field half-bottom">
					<i class="fa fa-lock"></i>
					<input type="password" name="password" placeholder="Password">
					<em>(required)</em>
				</div>

				<div class="page-login-field half-bottom">
					<i class="fa fa-phone"></i>
					<input type="number" name="contact" placeholder="Contact Number">
					<em>(required)</em>
				</div>

				<a class="forgot float-right" href="{{ url('page-login') }}"><i class="fa fa-user float-right"></i>Login</a>

				<button type="submit" class="button  button-full button-rounded button-s uppercase ultrabold" style="background: #88211a">Register</button>
			
			</form>
		</div>
	</div>
	
</div>
@endsection

@section('scripts')

        <script type="text/javascript" src="{{ asset('frontEnd/js/jquery.js') }}"></script>

        <script type="text/javascript" src="{{ asset('frontEnd/js/custom.js') }}"></script>

        <script type="text/javascript" src="{{ asset('frontEnd/js/plugins.js') }}"></script>
        
@endsection
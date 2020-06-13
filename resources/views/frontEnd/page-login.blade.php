@extends('layouts.frontEndLayout')
	@section('styles')
    	<link rel="stylesheet" href="{{ asset('frontEnd/css/framework.css') }}">
	@endsection

@section('content')

<div id="page-content-scroll" class="header-clear-larger" style="margin-top: -60px;height: 830px;background-image:url({{url('frontEnd/images/background.jpg')}})" >
	<div style="padding-top: 90px;">
	<div class="page-login content-boxed content-boxed-padding no-top">
		<img class="preload-image login-bg responsive-image no-bottom" src="{{ asset('frontEnd/images/logo-old.jpg') }}" data-src="{{ asset('frontEnd/images/logo-old.jpg') }}" alt="img">


		<h2 class="uppercase ultrabold full-top no-bottom color-black">Login</h2>

		<h5 class="half-bottom">Please Enter Your Credentials Below.</h5>
		<form action="{{ route('client.login') }}" method="post">
			@csrf
			<input type="hidden" name="client_login" value="client_login">

			<div class="page-login-field half-top">
				<i class="fa fa-user"></i>
				<input type="email" name="email" placeholder="Username">
				<em>(required)</em>
			</div>

			<div class="page-login-field half-bottom">
				<i class="fa fa-lock"></i>
				<input type="password" name="password" placeholder="Password">
				<em>(required)</em>
			</div>

			<div class="page-login-links small-bottom">
				<a class="forgot float-right" href="{{ url('page-signup') }}"><i class="fa fa-user float-right"></i>Create Account</a>
				{{-- <a class="create float-left" href="page-forgot.html"><i class="fa fa-eye"></i>Forgot Password</a> --}}
				<div class="clear"></div>
			</div>

			@if (Session::has('error'))
	            <div class="notification-small notification-has-icon notification-red">
					<div class="notification-icon"><i class="fa fa-exclamation-triangle notification-icon"></i></div>
					<p> {{ Session::get('error')}} </p>
					<a href="#" class="close-notification"><i class="fa fa-times"></i></a>
				</div>
	        @endif

			<button type="submit" class="button button-full button-rounded button-s uppercase ultrabold" style="background: #88211a"> LOGIN </button>
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
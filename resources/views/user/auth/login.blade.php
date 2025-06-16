<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="Great Prices | Trolleyway">
		<meta name="title" content="TrolleyWay | Sign-in Or Create Account">
		<meta name="author" content="Rakomana Prince">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>TrolleyWay | Sign-in Or Create Account</title>

		<link rel="shortcut icon" href="{{asset('logo_lkZ_icon.ico')}}" type="image/x-icon">

	    <!-- Bootstrap Core CSS -->
	    <link rel="stylesheet" href="{{asset('user\assets\css\bootstrap.min.css')}}">

	    <!-- Customizable CSS -->
	    <link rel="stylesheet" href="{{asset('user\assets\css\main.css')}}">
	    <link rel="stylesheet" href="{{asset('user\assets\css\blue.css')}}">
	    <link rel="stylesheet" href="{{asset('user\assets\css\owl.carousel.css')}}">
		<link rel="stylesheet" href="{{asset('user\assets\css\owl.transitions.css')}}">
		<link rel="stylesheet" href="{{asset('user\assets\css\animate.min.css')}}">
		<link rel="stylesheet" href="{{asset('user\assets\css\rateit.css')}}">
		<link rel="stylesheet" href="{{asset('user\assets\css\bootstrap-select.min.css')}}">




		<!-- Icons/Glyphs -->
		<link rel="stylesheet" href="{{asset('user\assets\css\font-awesome.css')}}">

        <!-- Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>


	</head>
    <body class="cnt-home">

			<x-header />

<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{url('/')}}">Home</a></li>
				<li class='active'>Login</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content" >
	<div class="container">
		<div class="sign-in-page" style="background-color: #f8f8f8;">
			<div class="row" >
				<!-- Sign-in -->
<div class="col-md-6 col-sm-6 sign-in">
	<h4 class="">Sign in</h4>

	<form class="register-form outer-top-xs" method="POST" action="{{route('login')}}">
		@csrf

		@if ($message = Session::get('error'))
		<div class="alert alert-danger alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>
				<strong>{{ $message }}</strong>
		</div>
		@endif

		<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
		    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror unicase-form-control text-input" id="exampleInputEmail1" required>

			@error('email')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
	  	<div class="form-group">
		    <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
		    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror unicase-form-control text-input" id="exampleInputPassword1" required>

			@error('password')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		{{-- <div class="form-group">
			<h6>Sign in with
				<span>
					<a style="width:300px;" href="{{url('login/facebook')}}" class="facebook-sign-in"><i class="fa fa-facebook"></i></a>
					<a style="width:300px;" href="{{url('login/google')}}" class="twitter-sign-in"><i class="fa fa-google"></i></a>
				</span>
			</h6>
		</div> --}}
		<div class="radio outer-xs">
		  	<label>
		    	<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Remember me!
		  	</label>
		  	<a href="{{ route('password.request') }}" class="forgot-password pull-right">Forgot your Password?</a>
		</div>
		<div class="text-center">
			<button id="login" class="btn-upper btn btn-primary">Login</button>
{{--			<button type="submit" class="btn-upper btn btn-primary">Login</button>--}}
		</div>
		<div class="text-center">
			<h6>Or with</h6>
			<span>
				<a style="width:300px;" href="{{url('login/facebook')}}" class="facebook-sign-in"><i class="fa fa-facebook"></i>acebook</a>
				&nbsp;&nbsp;
				<a style="width:300px;" href="{{url('login/google')}}" class="twitter-sign-in"><i class="fa fa-google"></i>oogle</a>
			</span>
		</div>
	</form>


</div>
<!-- Sign-in -->

<!-- create a new account -->
<div class="col-md-6 col-sm-6 create-new-account">
	<h4 class="checkout-subtitle">Create a new account</h4>


	<form class="register-form outer-top-xs" role="form" method="POST" action="{{route('register')}}">
		@csrf
		@if ($message = Session::get('error'))
		<div class="alert alert-danger alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>
				<strong>{{ $message }}</strong>
		</div>
		@endif

		<div class="form-group">
	    	<label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
	    	<input type="email" name="email" class="form-control @error('email') is-invalid @enderror unicase-form-control text-input" id="exampleInputEmail2" required>

			@error('email')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
	  	</div>
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
		    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror unicase-form-control text-input" id="exampleInputEmail1" required>

			@error('name')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
		    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror unicase-form-control text-input" id="exampleInputEmail1" required>

			@error('password')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
         <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
		    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror unicase-form-control text-input" id="exampleInputEmail1">

			@error('password_confirmation')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		<div class="text-center">
			<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
		</div>
	</form>


</div>
<!-- create a new account -->			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<div id="brands-carousel" class="logo-slider wow fadeInUp">

		<div class="logo-slider-inner">
			<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
				<div class="item m-t-15">
					<a href="#" class="image">
						<img data-echo="{{asset('user/assets/images/brands/brand1.png')}}" src="{{asset('user\assets\images\blank.gif')}}" alt="">
					</a>
				</div><!--/.item-->

				<div class="item m-t-10">
					<a href="#" class="image">
						<img data-echo="{{asset('user/assets/images/brands/brand2.png')}}" src="{{asset('user\assets\images\blank.gif')}}" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="{{asset('user/assets/images/brands/brand3.png')}}" src="{{asset('user\assets\images\blank.gif')}}" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="{{asset('user/assets/images/brands/brand4.png')}}" src="{{asset('user\assets\images\blank.gif')}}" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="{{asset('user/assets/images/brands/brand5.png')}}" src="{{asset('user\assets\images\blank.gif')}}')}}" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="{{asset('user/assets/images/brands/brand6.png')}}" src="{{asset('user\assets\images\blank.gif')}}" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="{{asset('user/assets/images/brands/brand2.png')}}" src="{{asset('user\assets\images\blank.gif')}}" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="{{asset('user/assets/images/brands/brand4.png')}}" src="{{asset('user\assets\images\blank.gif')}}" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="{{asset('user/assets/images/brands/brand1.png')}}" src="{{asset('user\assets\images\blank.gif')}}" alt="">
					</a>
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="{{asset('user/assets/images/brands/brand5.png')}}" src="{{asset('user\assets\images\blank.gif')}}" alt="">
					</a>
				</div><!--/.item-->
		    </div><!-- /.owl-carousel #logo-slider -->
		</div><!-- /.logo-slider-inner -->

</div><!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->
<x-footer/>
	<!-- For demo purposes – can be removed on production -->


	<!-- For demo purposes – can be removed on production : End -->

	<!-- JavaScripts placed at the end of the document so the pages load faster -->
	<script src="{{asset('user\assets\js\jquery-1.11.1.min.js')}}"></script>

	<script src="{{asset('user\assets\js\bootstrap.min.js')}}"></script>

	<script src="{{asset('user\assets\js\bootstrap-hover-dropdown.min.js')}}"></script>
	<script src="{{asset('user\assets\js\owl.carousel.min.js')}}"></script>

	<script src="{{asset('user\assets\js\echo.min.js')}}"></script>
	<script src="{{asset('user\assets\js\jquery.easing-1.3.min.js')}}"></script>
	<script src="{{asset('user\assets\js\bootstrap-slider.min.js')}}"></script>
    <script src="{{asset('user\assets\js\jquery.rateit.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('user\assets\js\lightbox.min.js')}}"></script>
    <script src="{{asset('user\assets\js\bootstrap-select.min.js')}}"></script>
    <script src="{{asset('user\assets\js\wow.min.js')}}"></script>
	<script src="{{asset('user\assets\js\scripts.js')}}"></script>
    <script type="module" src="{{asset('\js\main.js')}}"></script>

            <!-- For demo purposes – can be removed on production -->

	<script src="{{asset('user\switchstylesheet/switchstylesheet.js')}}"></script>

	<script>
		$(document).ready(function(){
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>
	<!-- For demo purposes – can be removed on production : End -->


</body>
</html>

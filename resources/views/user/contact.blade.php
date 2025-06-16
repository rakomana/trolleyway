@extends('user.layouts.default')

@section('content')

<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Contact</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
    <div class="contact-page">
		<div class="row">
			
				<div class="col-md-9 contact-form">
	<div class="col-md-12 contact-title">
		<h4>Contact Form</h4>
	</div>
	<form method="POST" action="{{url('contact')}}">
	@csrf

	@if ($message = Session::get('success'))
	<div class="alert alert-success alert-block">
		<button type="button" class="close" data-dismiss="alert">×</button>	
			<strong>{{ $message }}</strong>
	</div>
	@endif

	<div class="col-md-4 ">
		<div class="form-group">
		    <label class="info-title" for="exampleInputName">Your Name <span>*</span></label>
		    <input type="text" name="name" class="form-control unicase-form-control @error('name') is-invalid @enderror unicase-form-control text-input" id="exampleInputName" placeholder="" required>

			@error('name')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror			
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
		    <input type="email" name="email" class="form-control unicase-form-control @error('email') is-invalid @enderror unicase-form-control text-input" id="exampleInputEmail1" placeholder="" required>

			@error('email')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
		    <label class="info-title" for="exampleInputTitle">Type <span>*</span></label>
		    <select type="text" name="title" class="form-control unicase-form-control @error('title') is-invalid @enderror unicase-form-control text-input" id="exampleInputTitle" placeholder="Title" required>
				<option value="" selected="true" disabled="disabled">select-option</option>
				<option value="delivery">Delivery</option>
				<option value="order">Order</option>
				<option value="product">Product</option>
				<option value="warranty">Warranty</option>
			</select>

			@error('title')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
		    <label class="info-title" for="exampleInputComments">Your Comments <span>*</span></label>
		    <textarea name="comment" class="form-control unicase-form-control @error('title') is-invalid @enderror unicase-form-control text-input" id="exampleInputComments" required></textarea>

			@error('comment')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
	</div>
	<div class="col-md-12 outer-bottom-small m-t-20">
		<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Send Message</button>
	</div>
</form>
</div>
<div class="col-md-3 contact-info">
	<div class="contact-title">
		<h4>Information</h4>
	</div>
	<div class="clearfix address">
		<span class="contact-i"><i class="fa fa-map-marker"></i></span>
		<span class="contact-span">Tzaneen Limpopo</span>
	</div>
	<div class="clearfix phone-no">
		<span class="contact-i"><i class="fa fa-mobile"></i></span>
		<span class="contact-span"><a href="tel:0720606418">+(27) 84 064 6869</a><br></span>
	</div>
	<div class="clearfix email">
		<span class="contact-i"><i class="fa fa-envelope"></i></span>
		<span class="contact-span"><a href="mailto:info@trolleyway.co.za">info@trolleyway.co.za</a></span>
	</div>
</div>			</div><!-- /.contact-page -->
		</div><!-- /.row -->
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
						<img data-echo="{{asset('user/assets/images/brands/brand5.png')}}" src="{{asset('user\assets\images\blank.gif')}}" alt="">
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
@endsection

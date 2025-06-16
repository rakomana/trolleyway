@extends('user.layouts.default')

@section('content')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{url('/')}}">Home</a></li>
				<li class='active'>Wishlist</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="my-wishlist-page">

			@if ($message = Session::get('success'))
			<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button>	
				<div class="center">
					<strong>{{ $message }}</strong>
				</div>
			</div>
			@endif

			@if ($message = Session::get('error'))
			<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button>	
				<div class="center">
					<strong>{{ $message }}</strong>
				</div>
			</div>
			@endif

			<div class="row">
				<div class="col-md-12 my-wishlist">

	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th colspan="4" class="heading-title">My Wishlist</th>
				</tr>
			</thead>
			<tbody>
				@foreach($products as $product)
				<tr>
					<td class="col-md-2">
						<?php $count = 0; ?>
						@foreach(json_decode($product->image, true) as $image)
							<?php if($count == 1) break; ?>
							<img src="{{Storage::cloud()->url($image)}}" alt="">
							<?php $count++; ?>
						@endforeach							
					</td>
					<td class="col-md-7">
						<div class="product-name"><a href="{{url('detail/'.$product->id)}}">{{$product->title}}</a></div>
						<div class="rating">
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star non-rate"></i>
							<span class="review">( Reviews )</span>
						</div>
						<div class="price">
							R{{$product->new_price}}.00
							<span>R{{$product->old_price}}.00</span>
						</div>
					</td>
					<td class="col-md-2">
						<form method="POST" action="{{url('cart/'.$product->id)}}">
							@csrf
							<button class="btn btn-primary cart-btn" type="submit">Add to cart</button>
						</form>
					</td>
					<td class="col-md-1 close-btn">
						<a href="{{url('cart/delete/'.$product->id)}}" class=""><i class="fa fa-times"></i></a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>			</div><!-- /.row -->
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
</div><!-- /.body-content -->
@endsection
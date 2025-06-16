@extends('user.layouts.default')

@section('content')

<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li><a href="#">{{$product->category}}</a></li>
				<li class='active'>{{$product->title}}</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->

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

	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product'>
			<div class='col-md-3 sidebar'>
				<div class="sidebar-module-container">
				
				<!-- ================================== TOP NAVIGATION ================================== -->
				<div class="side-menu animate-dropdown outer-bottom-xs " >
					<div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
					<nav class="yamm megamenu-horizontal">
					<ul class="nav">
						<li class="dropdown menu-item"> <a href="{{url('category/electronics')}}" class="dropdown-toggle"><i class="icon fa fa-laptop" aria-hidden="true"></i>Electronics</a>
						<li class="dropdown menu-item"> <a href="{{url('category/watches')}}" class="dropdown-toggle"><i class="icon fa fa-clock-o"></i>Watches</a>
						<!-- /.menu-item -->
						
					</ul>
					<!-- /.nav --> 
					</nav>
					<!-- /.megamenu-horizontal --> 
				</div>
				<!-- /.side-menu --> 
				<!-- ================================== TOP NAVIGATION : END ================================== -->

				<div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small hidden-xs">
					<h3 class="section-title">Newsletters</h3>
					<div class="sidebar-widget-body outer-top-xs">
					  <p>Sign Up for Our Newsletter!</p>
					  <form method="POST" action="{{url('subscribe')}}">
						@csrf
						<div class="form-group">
						  <label class="sr-only" for="exampleInputEmail1">Email address</label>
						  <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
						</div>
						<button type="submit" class="btn btn-primary">Subscribe</button>
					  </form>
					</div>
					<!-- /.sidebar-widget-body --> 
				  </div>
				  <!-- /.sidebar-widget --> 
				  <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small hidden-xs"> 
					<h3 class="section-title">Download Our App</h3>
					<a href="#">
					  <img style="width: 100px;" src="{{asset('user/assets/images/Download_on_the_App_Store_Badge.svg')}}" alt="Download_on_the_App_Store_Badge">
					</a>
					<a href="https://play.google.com/store/apps/details?id=com.trolleyway.multivendor_shop">
					  <img style="width: 100px;" src="{{asset('user/assets/images/Google_Play_Store_badge_EN.svg')}}" alt="Google_Play_Store_badge_EN">
					</a>
				  </div>
		  
				  <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small hidden-xs"> 
					<h3 class="section-title">Follow Us</h3>
					<a href="https://www.facebook.com/Trolleyway-107523054365644">
					  <i class="fa fa-facebook"></i>
					</a>
					&nbsp;&nbsp;
					<a href="#">
					  <i class="fa fa-twitter"></i>
					</a>
					&nbsp;&nbsp;
					<a href="#">
					  <i class="fa fa-instagram"></i>
					</a>
				  </div>
				<!-- /.sidemenu-holder --> 
				<!-- ============================================== SIDEBAR : END ============================================== --> 

				</div>
			</div><!-- /.sidebar -->
							<div  class="quantity-container info-container">
			<div id="implement" class='col-md-9'>
            <div class="detail-block">
				<div class="row  wow fadeInUp">
                
					     <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
    <div class="product-item-holder size-big single-product-gallery small-gallery">

        <div id="owl-single-product">
			<?php $count = 1; ?>
			@foreach(json_decode($product->image, true) as $image)
            <div class="single-product-gallery-item" id="slide{{$count}}">
                <a data-lightbox="image-1" data-title="Gallery" href="{{Storage::cloud()->url($image)}}">
					  <img style="width: 100%" class="img-responsive" alt="" src="{{asset('user\assets\images\blank.gif')}}" data-echo="{{Storage::cloud()->url($image)}}">
                </a>
            </div><!-- /.single-product-gallery-item -->
			<?php $count++; ?>
			@endforeach	
        </div><!-- /.single-product-slider -->

		<div class="single-product-gallery-thumbs gallery-thumbs">
            <div id="owl-single-product-thumbnails">
				<?php $count1 = 1; ?>
				@foreach(json_decode($product->image, true) as $image)
                <div class="item">
                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="{{$count1}}" href="#slide{{$count1}}">
                        <img class="img-responsive" width="85" alt="" src="assets\images\blank.gif" data-echo="{{Storage::cloud()->url($image)}}">
                    </a>
                </div>
				<?php $count1++; ?>
				@endforeach	
            </div><!-- /#owl-single-product-thumbnails -->
        </div><!-- /.gallery-thumbs -->

    </div><!-- /.single-product-gallery -->
</div><!-- /.gallery-holder -->        			
					<div class='col-sm-6 col-md-7 product-info-block'>
						<div class="product-info">
							<h1 class="name">{{$product->title}}</h1>
							
							<div class="rating-reviews m-t-20">
								<div class="row">
									<div class="col-sm-3">
										<div class="rating rateit-small"></div>
									</div>
									<div class="col-sm-8">
										<div class="reviews">
											<a href="#" class="lnk">({{count($reviews)}} Reviews)</a>
										</div>
									</div>
								</div><!-- /.row -->		
							</div><!-- /.rating-reviews -->

							<div class="stock-container info-container m-t-10">
								<div class="row">
									<div class="col-sm-2">
										<div class="stock-box">
											<span class="label">Availability :</span>
										</div>	
									</div>
									<div class="col-sm-9">
										<div class="stock-box">
											<span class="value">{{$product->status}}</span>
										</div>	
									</div>
								</div><!-- /.row -->	
							</div><!-- /.stock-container -->

							<div class="description-container m-t-20">
								{{$product->description}}
							</div><!-- /.description-container -->

							<div class="price-container info-container m-t-20">
								<div class="row">
									

									<div class="col-sm-6">
										<div class="price-box">
											<span class="price">R{{$product->new_price}}.00</span>
											<span class="price-strike">R{{$product->old_price}}.00</span>
										</div>
									</div>

									<div class="col-sm-6">
											<div id="social-links">
												<span class="price">Share Product&nbsp;&nbsp;</span>
												<a href="https://www.facebook.com/sharer/sharer.php?u=http://trolleyway.co.za/detail/{{$product->id}}" class="social-button " id=""><span class="fa fa-facebook-official fa-lg"></span></a>&nbsp;&nbsp;&nbsp;
												<a href="https://twitter.com/intent/tweet?text=my share text&amp;url=http://trolleyway.co.za/detail/{{$product->id}}" class="social-button " id=""><span class="fa fa-twitter fa-lg"></span></a>&nbsp;&nbsp;&nbsp;
												<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://trolleyway.co.za/detail/{{$product->id}}&amp;title=my share text&amp;summary=dit is de linkedin summary" class="social-button " id=""><span class="fa fa-linkedin fa-lg"></span></a>&nbsp;&nbsp;&nbsp;
												<a href="https://wa.me/?text=http://trolleyway.co.za/detail/{{$product->id}}" class="social-button " id=""><span class="fa fa-whatsapp fa-lg"></span></a>
											</div>
									</div>

								</div><!-- /.row -->
							</div><!-- /.price-container -->

							<div class="quantity-container info-container">
								<div class="row">
									
									<div class="col-sm-2">
										<span class="label">Qty :</span>
									</div>
									
									<div class="col-sm-2">
										<div class="cart-quantity">
											<div class="quant-input">
								                <div class="arrows">
								                  <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc" @click="plus"></i></span></div>
								                  <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc" @click="minus"></i></span></div>
								                </div>
								                <input type="text" v-model="form.quantity" value="1">
							              </div>
							            </div>
									</div>

									<div class="col-sm-7">
										<form method="POST" action="{{url('cart/'.$product->id)}}">
											@csrf
											<input type="hidden" name="quantity" v-model="form.quantity">
											<button class="btn btn-primary cart-btn" type="submit">Add to cart</button>
										</form>
									</div>

									
								</div><!-- /.row -->
							</div><!-- /.quantity-container -->

							

							

							
						</div><!-- /.product-info -->
					</div><!-- /.col-sm-7 -->
				</div><!-- /.row -->
                </div>
				
				<div class="product-tabs inner-bottom-xs  wow fadeInUp">
					<div class="row">
						<div class="col-sm-3">
							<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
								<li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
								<li><a data-toggle="tab" href="#review">REVIEW</a></li>
							</ul><!-- /.nav-tabs #product-tabs -->
						</div>
						<div class="col-sm-9">

							<div class="tab-content">
								
								<div id="description" class="tab-pane in active">
									<div class="product-tab">
										<p class="text"> {{$product->description}}</p>
									</div>	
								</div><!-- /.tab-pane -->

								<div id="review" class="tab-pane">
									<div class="product-tab">
																				
										<div class="product-reviews">
											<h4 class="title">Customer Reviews</h4>
											@foreach($reviews as $review)
											<div class="reviews">
												<div class="review">
													<div class="review-title"><span class="summary">{{$review->name}}</span><span class="date"><i class="fa fa-calendar"></i><span>
														<?php 
															$date1 = date_create($review->created_at);
															$date2=date_create(date("Y-m-d"));
															echo date_diff($date1, $date2)->format("%R%a days");
														 ?>	
														ago
													</span></span></div>
													<div class="text">{{$review->review}}</div>
																										</div>
											
											</div><!-- /.reviews -->
											@endforeach
										</div><!-- /.product-reviews -->
										

										
										<div class="product-add-review">
											<h4 class="title">Write your own review</h4>
											
											<div class="review-form">
												<div class="form-container">
													<form  role="form" class="cnt-form" @submit.prevent="writeReview">
														
														<div class="row">
															<div class="col-sm-6">
																<div class="form-group">
																	<label for="exampleInputSummary">Rating <span class="astk">*</span></label>
																	<input type="number" v-model="info.rating" value="5" min="1" max="{{$product->quantity}}" step="1" class="form-control txt" id="exampleInputSummary" placeholder="" required>
																</div><!-- /.form-group -->
															</div>

															<div class="col-md-6">
																<div class="form-group">
																	<label for="exampleInputReview">Review <span class="astk">*</span></label>
																	<textarea v-model="info.review" class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder="" required></textarea>
																</div><!-- /.form-group -->
															</div>
														</div><!-- /.row -->
														
														<div class="action text-right">
															<button class="btn btn-primary btn-upper" type="submit">SUBMIT REVIEW</button>
														</div><!-- /.action -->

													</form><!-- /.cnt-form -->
												</div><!-- /.form-container -->
											</div><!-- /.review-form -->

										</div><!-- /.product-add-review -->										
										
							        </div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->

							</div><!-- /.tab-content -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.product-tabs -->

				<!-- ============================================== UPSELL PRODUCTS ============================================== -->
<section class="section featured-product wow fadeInUp">
	<h3 class="section-title">recommended products</h3>
	<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
	@foreach($products as $item)
		<div class="item item-carousel">
			<div class="products">
				
	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="{{url('detail/'.$item->id)}}">
					<?php $count3 = 0; ?>
					@foreach(json_decode($item->image, true) as $image)
					  <?php if($count3 == 1) break; ?>
						<img alt="alt" src="{{Storage::cloud()->url($image)}}">
					  <?php $count3++; ?>
					@endforeach					
				</a>
			</div><!-- /.image -->			

			            <div class="tag sale"><span>sale</span></div>            		   
		</div><!-- /.product-image -->
			
		
		<div class="product-info text-left">
			<h3 class="name"><a href="{{url('detail/'.$item->id)}}">{{$item->title}}</a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">
					R{{$item->new_price}}.00
				</span>
				<span class="price-before-discount">R{{$item->old_price}}00</span>
									
			</div><!-- /.product-price -->
			
		</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">
						<li class="add-cart-button btn-group">
							<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
								<i class="fa fa-shopping-cart"></i>													
							</button>
							<form method="POST" action="{{url('cart/'.$item->id)}}">
								@csrf
								<button class="btn btn-primary cart-btn" type="submit">Add to cart</button>
							</form>
													
						</li>
	                   
		                <li class="lnk wishlist">
							<a class="add-to-cart" href="{{url('detail/'.$item->id)}}" title="Wishlist">
								 <i class="icon fa fa-heart"></i>
							</a>
						</li>

						<li class="lnk">
							<a class="add-to-cart" href="{{url('detail/'.$item->id)}}" title="Compare">
							    <i class="fa fa-signal"></i>
							</a>
						</li>
					</ul>
				</div><!-- /.action -->
			</div><!-- /.cart -->
			</div><!-- /.product -->
      
			</div><!-- /.products -->
		</div><!-- /.item -->
		@endforeach
			</div><!-- /.home-owl-carousel -->
</section><!-- /.section -->
<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
			
			</div><!-- /.col -->
			<div class="clearfix"></div>
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
						<img data-echo="{{asset('user/assets/images/brands/brand1.png')}}" src="{{asset("user\assets\images\blank.gif")}}" alt="">
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
		<!-- calculation -->

		<script>
			const App = new Vue({
				el: "#implement",
				data: {
            		loading: false,
					form: {
						quantity: 1,
					},
					info: {
						product_id: <?php echo "'".$product->id."'"?>,
						rating: null,
						review: null,
					}
				},
				computed: {
				  totalAmount()
				  {
					return this.form.quantity;
				  } 
				},
				methods: {
					plus: function() {
						if(this.form.quantity < <?php echo "'".$product->quantity."'"?>)
						{
							this.form.quantity++;
						}
					},
					minus: function() {
						if(this.form.quantity > 1)
						{
							this.form.quantity--;
						}
					},
					writeReview: function () {
					this.loading = true
					axios.post('/review/' + this.info.product_id , this.info)
					.then(response => {
						this.loading = false
						swal("Well done!", "Review Added", "success");
					})
					.catch(error => {
						this.loading = false
						swal("Oops!", "Purchase first to write review", "warning");
					})

					}
				}
			})
		</script>

@endsection
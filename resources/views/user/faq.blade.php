@extends('user.layouts.default')

@section('content')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{url('/')}}">Home</a></li>
				<li class='active'>FAQ</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="checkout-box faq-page">
			<div class="row">
				<div class="col-md-12">
					<h2 class="heading-title">Frequently Asked Questions</h2>
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

	<!-- panel-heading -->
		<div class="panel-heading">
    	<h4 class="unicase-checkout-title">
	        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
	          <span>1</span>Delivery
	        </a>
	     </h4>
    </div>
    <!-- panel-heading -->

	<div id="collapseOne" class="panel-collapse collapse in">

		<!-- panel-body  -->
	    <div class="panel-body">
	    	Apologies we currently deliver around Gauteng, we will soon venture to other provinces, but you can contact admin through out contact platform to arrange an alternative or maybe so we can arrange through pep paxi courier.			
		</div>
		<!-- panel-body  -->

	</div><!-- row -->
</div>
<!-- checkout-step-01  -->
					    <!-- checkout-step-02  -->
					  	<div class="panel panel-default checkout-step-02">
						    <div class="panel-heading">
						      <h4 class="unicase-checkout-title">
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseTwo">
						          <span>2</span>Refund	
						        </a>
						      </h4>
						    </div>
						    <div id="collapseTwo" class="panel-collapse collapse">
						      <div class="panel-body">
						        Refund only applies when the product is damaged or faulty upon recepient of the product, or when the product takes more than 30 days to be delivered
						      </div>
						    </div>
					  	</div>
					  	<!-- checkout-step-02  -->

						<!-- checkout-step-03  -->
					  	<div class="panel panel-default checkout-step-03">
						    <div class="panel-heading">
						      <h4 class="unicase-checkout-title">
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseThree">
						       		<span>3</span>Order issues
						        </a>
						      </h4>
						    </div>
						    <div id="collapseThree" class="panel-collapse collapse">
						      <div class="panel-body">
						        There 's no order cancellation, and when there 's order issue please contact our support through the platform
						      </div>
						    </div>
					  	</div>
					  	<!-- checkout-step-03  -->

						<!-- checkout-step-04  -->
					    <div class="panel panel-default checkout-step-04">
						    <div class="panel-heading">
						      <h4 class="unicase-checkout-title">
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseFour">
						        	<span>4</span>Payments, Promos & Gift Vouchers
						        </a>
						      </h4>
						    </div>
						    <div id="collapseFour" class="panel-collapse collapse">
							    <div class="panel-body">
							         You get R10 coupon code when you refer an individual to the platform and the person you refer need to spend more than R250 in order for the coupon to be shared to you. 
							    </div>
					    	</div>
						</div>
						<!-- checkout-step-04  -->

						<!-- checkout-step-05  -->
					  	<div class="panel panel-default checkout-step-05">
						    <div class="panel-heading">
						      <h4 class="unicase-checkout-title">
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseFive">
						        	<span>5</span>How can I return a product
						        </a>
						      </h4>
						    </div>
						    <div id="collapseFive" class="panel-collapse collapse">
						      <div class="panel-body">
						        Schedule a return through our platform on the return section if all variables have been met and our delivery team will come to collect
						      </div>
						    </div>
					    </div>
					    <!-- checkout-step-05  -->

						<!-- checkout-step-06  -->
					  	<div class="panel panel-default checkout-step-06">
						    <div class="panel-heading">
						      <h4 class="unicase-checkout-title">
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseSix">
						        	<span>6</span>How long will it take to get my package ?
						        </a>
						      </h4>
						    </div>
					    	<div id="collapseSix" class="panel-collapse collapse">
					      		<div class="panel-body">
					        		It takes up to 14 working days for the item to get delivered to you
					      		</div>
					    	</div>
					  	</div>
					  	<!-- checkout-step-06  -->

					  	<!-- checkout-step-07  -->
					  	<div class="panel panel-default checkout-step-07">
						    <div class="panel-heading">
						      <h4 class="unicase-checkout-title">
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseSeven">
						        	<span>7</span>What Shipping methods are available ?
						        </a>
						      </h4>
						    </div>
					    	<div id="collapseSeven" class="panel-collapse collapse">
					      		<div class="panel-body">
					        		We have two delivery methods, so through our delivery tream we only deliver around Gauteng and we also use paxi to deliver all over South Africa,					      		</div>
					    	</div>
					  	</div>
					  	<!-- checkout-step-07  -->

					  	<!-- checkout-step-08  -->
					  	<div class="panel panel-default checkout-step-08">
						    <div class="panel-heading">
						      <h4 class="unicase-checkout-title">
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseEight">
						        	<span>8</span>Do you provide any warranty ?
						        </a>
						      </h4>
						    </div>
					    	<div id="collapseEight" class="panel-collapse collapse">
					      		<div class="panel-body">
					        		  We provide warranty of 30 days for faulty products only
					      		</div>
					    	</div>
					  	</div>
					  	<!-- checkout-step-08  -->
					  	
					</div><!-- /.checkout-steps -->
				</div>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
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
						<img data-echo="{{url('user/assets/images/brands/brand2.png')}}" src="{{url('user\assets\images\blank.gif')}}" alt="">
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
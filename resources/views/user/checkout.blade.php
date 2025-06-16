@extends('user.layouts.default')

@section('content')
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Checkout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div id="implement" class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
						<div class="panel panel-default checkout-step-01">

							<!-- panel-heading -->
								<div class="panel-heading">
								<h4 class="unicase-checkout-title">
									<a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
									<span>1</span>Billing Information
									</a>
								</h4>
							</div>
							<!-- panel-heading -->

							<div id="collapseOne" class="panel-collapse collapse in">

								<!-- panel-body  -->
								<div class="panel-body">
									@if($address == null)

									<div class="row">		
										<form method="POST" action="{{url('address')}}" >
											@csrf
										<!-- register address -->
										<div class="col-md-6 col-sm-6 already-registered-login">
											<h4 class="checkout-subtitle">Help us keep your account safe and secure, please verify your billing information.</h4>
											
												<div class="form-group">
												<label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
												<input type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="">
											</div>
											<div class="form-group">
												<label class="info-title" for="exampleInputPassword1">First Name <span>*</span></label>
												<input type="text" name="first_name" class="form-control unicase-form-control text-input" id="exampleInputPassword1" placeholder="">
											</div>
											<div class="form-group">
												<label class="info-title" for="exampleInputPassword1">Last Name <span>*</span></label>
												<input type="text" name="last_name" class="form-control unicase-form-control text-input" id="exampleInputPassword1" placeholder="">
											</div>
											<div class="form-group">
												<label class="info-title" for="exampleInputPassword1">Phone Number <span>*</span></label>
												<input type="text" name="phone_number" class="form-control unicase-form-control text-input" id="exampleInputPassword1" placeholder="">
											</div>
											
										</div>
									

										<!-- already-registered-login -->
										<div class="col-md-6 col-sm-6 already-registered-login">
											<h4 class="checkout-subtitle">Already registered?</h4>
											<div class="form-group">
												<label class="info-title" for="exampleInputPassword1">Delivery Type <span>*</span></label><br>
												<input type="radio" @click="pepOption" name="type" value="pep"><label>PEP(PAXI)</label>&nbsp;&nbsp;
												<input type="radio" @click="courierOption" name="type" value="courier"><label>COURIER</label>
											</div>
											<div v-if="form.pep" class="form-group">
												<label class="info-title" for="exampleInputPassword1">PEP Store <span>*</span></label>
												<select type="text" name="store" class="form-control unicase-form-control text-input" id="exampleInputPassword1" placeholder="">
													<option>select</option>
													@foreach($stores as $store)
														<option value="{{$store->store}}">{{$store->store}}</option>
													@endforeach
												</select>
											</div>
											<div v-if="form.courier" class="form-group">
												<label class="info-title" for="exampleInputPassword1">Address <span>*</span></label>
												<input type="text" name="address" class="form-control unicase-form-control text-input" id="exampleInputPassword1" placeholder="">
											</div>
											<div v-if="form.courier" class="form-group">
												<label class="info-title" for="exampleInputEmail1">Unit <span>*</span></label>
												<input type="text" name="unit" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="">
											</div>
											
										</div>	
										<!-- already-registered-login -->
										<div class="text-center">
											<button type="submit" class="btn btn-primary">Submit</button>
										</div>
									</form>	
									</div>	
									@else
									<table class="table">
										<thead>
											<tr>
												<th></th>
												<th class="cart-total last-item">First Name</th>
												<th class="cart-total last-item">Last Name</th>
												<th class="cart-total last-item">Type</th>
												<th class="cart-total last-item">Contact</th>
												@if($address->type == 'pep')
													<th class="cart-total last-item">Store</th>
												@else
													<th class="cart-total last-item">Unit</th>
													<th class="cart-total last-item">Address</th>
												@endif
											</tr>
										</thead>
										<tr>
											<td class="romove-item">
												<a href="{{url('address/'.$address->id)}}" title="cancel" class="icon"><i class="fa fa-trash-o"></i></a></td>
											<td>{{$address->first_name}}</td>
											<td>{{$address->last_name}}</td>
											<td>{{$address->type}}</td>
											<td>{{$address->phone_number}}</td>
											@if($address->type == 'pep')
												<td>{{$address->store}}</td>
											@else
												<td>{{$address->unit}}</td>
											@endif
											<td>{{$address->address}}</td>
										</tr>
									</table>
									@endif	
								</div>
								<!-- panel-body  -->
							</div><!-- row -->
						
						
						</div>
						<!-- checkout-step-01  -->

						<!-- checkout-step-02  -->
					  	<div class="panel panel-default checkout-step-02">
						    <div class="panel-heading">
						      <h4 class="unicase-checkout-title">
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseFive">
						        	<span>5</span>Checkout
						        </a>
						      </h4>
						    </div>
						    <div id="collapseFive" class="panel-collapse collapse">
						      <div class="panel-body">
								<table class="table table-striped">
									<tr>
										<td colspan="2">
											<a class="btn btn-warning btn-sm pull-right"
											   href="http://www.startajobboard.com/"
											   title="Remove Item">X</a>
											<b>
												Order Summary</b></td>
									</tr>
									<tr>
										<td>
											<ul>
												@foreach ($cart as $item)
												<li>{{$item->title}}</li>
												@endforeach
											</ul>
										</td>
										<td>
												@if(session()->has('coupon'))
												Order Total&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;R<?php
														$grand_total = $total - session()->get('coupon')['discount'];

														echo $grand_total;
													?>
												@else
												Order Total&nbsp;&nbsp;&nbsp;&nbsp;R<?php
														$grand_total = $total;

														echo $grand_total;
													?>
													
												@endif

												{{-- grand total plus delivery --}}
												<?php
													$delivery = 0;
													if($grand_total > 449)
													{
														$delivery_plus_total = $grand_total;
													}else {
														$delivery = 60;
														$delivery_plus_total = $grand_total + $delivery;
													}
												?>

												<br>
													Delivery Fee&nbsp;&nbsp;R{{$delivery}}<br>
													Grand Total&nbsp;&nbsp;&nbsp;R{{$delivery_plus_total}}
											
										</td>
									</tr>
								</table>
								<form action="https://www.payfast.co.za/eng/process" method="post">
									<input type="checkbox" id="f-option4" required>
									<label for="f-option4">I’ve read and accept the </label>
									<a href="#">terms & conditions*</a>
									
									
										<input type="hidden" name="merchant_id" value="15060257">
										<input type="hidden" name="merchant_key" value="bx0ammk3a9zxr">
										<input type="hidden" name="return_url" value="https://trolleyway.co.za/success/{{$order_num}}">
										<input type="hidden" name="cancel_url" value="https://trolleyway.co.za/cancel">
										<input type="hidden" name="notify_url" value="https://trolleyway.co.za/notify">
										<input type="hidden" name="amount" value="{{ $delivery_plus_total }}">
										<input type="hidden" name="item_name" value="Test Product">
										<div class="text-center">
											<input type="submit" class="btn btn-primary" value="Credit/Debit">
										</div>
									</form>
									{{-- <form action="https://sandbox.payfast.co.za​/eng/process" method="post">
										<input type="checkbox" id="f-option4" required>
										<label for="f-option4">I’ve read and accept the </label>
										<a href="#">terms & conditions*</a>
										
										
											<input type="hidden" name="merchant_id" value="10000100">
											<input type="hidden" name="merchant_key" value="46f0cd694581a">
											<input type="hidden" name="return_url" value="http://127.0.0.1:8000/success/{{$order_num}}">
											<input type="hidden" name="cancel_url" value="http://127.0.0.1:8000/cancel">
											<input type="hidden" name="notify_url" value="http://127.0.0.1:8000/notify">
											<input type="hidden" name="amount" value="{{ $delivery_plus_total }}">
											<input type="hidden" name="item_name" value="Test Product">
											<div class="text-center">
												<input type="submit" class="btn btn-primary" value="Credit/Debit">
											</div>
										</form> --}}
									<form method="POST" action="{{url('/delivery/success/'.$order_num)}}">
										@csrf
										<div class="text-center" style="margin-top: 10px;">
											<input type="submit" class="btn btn-primary" value="Pay on Delivery">
										</div>
									</form>
								
						      </div>
						    </div>
					    </div>
					    <!-- checkout-step-02  -->
					  	
					</div><!-- /.checkout-steps -->
				</div>
				<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Your Checkout Progress</h4>
		    </div>
		    <div class="">
				<ul class="nav nav-checkout-progress list-unstyled">
					<li><a href="#">Billing Address</a></li>
					<li><a href="#">Checkout</a></li>
				</ul>		
			</div>
		</div>
	</div>
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Billing Information</h4>
		    </div>
		    <div class="">
				<ul class="nav nav-checkout-progress list-unstyled">
					<li><a href="#">First Name</a><span><b>@{{form.first_name}}</b></span></li>
					<li><a href="#">Last Name</a><span><b>@{{form.last_name}}</b></li>
					<li><a href="#">Email</a><span><b>@{{form.email}}</b></span></li>
					<li><a href="#">Phone Number</a><span><b>@{{form.phone_number}}</b></span></li>
					<li><a href="#">Delivery Type</a><span><b>@{{form.type}}</b></span></li>
					<li><a href="#">PAXI(PEP)</a><span><b>@{{form.store}}</b></span></li>
					<li><a href="#">Address</a><span><b>@{{form.address}}</b></span></li>
				</ul>		
			</div>
		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar -->				</div>
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
						<img data-echo="{{asset('user/assets/images/brands/brand3.png')}}" src="{{('user\assets\images\blank.gif')}}" alt="">
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

<script>
	const App = new Vue({
		el: "#implement",
		data: {
			form: {
				courier: false,
				pep: false,
			},
		},
		methods: {
			pepOption: function() {
				this.form.pep = true
				this.form.courier = false
			},
			courierOption: function() {
				this.form.pep = false
				this.form.courier = true
			},
		},
	})
</script>
@endsection
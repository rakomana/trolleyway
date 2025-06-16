@extends('admin.layouts.app')

	@section('content')

		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
			<x-admin.header/>
			<!-- /Header -->
			
			<!-- Sidebar -->
			<x-admin.sidebar/>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Order Details</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('admin')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Order Details</li>
								</ul>
							</div>
						</div>
					</div>
					
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-6 col-sm-12">
									<div class="product-view">
										<div class="proimage-wrap">
											<div class="pro-image" id="pro_popup">
												<a href="{{Storage::cloud()->url($image)}}">
													<img class="img-fluid" src="{{Storage::cloud()->url($image)}}" alt="Product Image">
												</a>
											</div>
										</div>

										<br><p><b>Status: </b>{{$userProduct->status}}</p>
										<form method="POST" action="{{url('admin/order/update/'.$userProduct->id)}}">
											@csrf
											<p><b>Delivery(Tracking)</b></p>
											<div class="form-group row">
												<div class="col-md-12">
													<textarea name="track" rows="5" cols="5" class="form-control @error('track') is-invalid @enderror" placeholder="{{$userProduct->track}}" required></textarea>
	
													@error('meta_description')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
													@enderror
												</div>
											</div>

											<div class="form-group row">
												<div class="col-md-12 text-center">
													<button type="submit" class="btn btn-primary center">Process</button>
												</div>
											</div>
										</form>
									</div>
								</div>
								<div class="col-md-6 col-sm-12">
									<div class="product-info">
										<h2>{{$product->title}}</h2>
										<div class="rating">
											<p>
												<span><i class="fa fa-star rated"></i></span>
												<span><i class="fa fa-star rated"></i></span>
												<span><i class="fa fa-star rated"></i></span>
												<span><i class="fa fa-star rated"></i></span>
												<span><i class="fa fa-star-o "></i></span>
											</p>
										</div>
										<p>R{{$product->new_price}} x ({{$userProduct->quantity}} items)</p>
										<p>Total: R{{($product->new_price) * ($userProduct->quantity)}}</p>
										<p><b>Availability:</b> {{$product->status}}</p>
										<p><img src="{{asset('user/assets/images/user.png')}}" height="50px;" width="50px;">{{$user->name}}
											<small>{{$user->email}}</small></p>
										<p><b>Billing Information:</b><br></p>
											<small> {{$address->first_name.' '.$address->last_name}}</small><br>
											<small>{{$address->email.'  '.$address->phone_number}}</small><br>
											<small>Delivery Type: {{$address->type}}
												@if($address->type == 'pep')
													&nbsp;({{$address->store}})
												@else
													<br>{{$address->address.' '.$address->unit}}
												@endif
											</small>

									</div>
								</div>
							</div>
						</div>
					</div>
				
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
		
@endsection
@extends('seller.layouts.app')

	@section('content')
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            <div class="header">
			
				<!-- Logo -->
                <div class="header-left">
                    <a href="{{url('seller')}}" class="logo">
						<img src="{{asset('user\assets\images\logo.png')}}" alt="Logo">
					</a>
					<a href="{{url('seller')}}" class="logo logo-small">
						<img src="{{asset('user\assets\images\logo.png')}}" alt="Logo" width="30" height="30">
					</a>
                </div>
				<!-- /Logo -->
				
				<a href="javascript:void(0);" id="toggle_btn">
					<i class="fe fe-text-align-left"></i>
				</a>
				
            </div>
			<!-- /Header -->
			
			<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span></span>
							</li>
							<li> 
								<a href="{{url('seller')}}"><i class="fe fe-home"></i> <span>Contact Us</span></a>
							</li>
							<li> 
								<a href="{{url('seller')}}"><i class="fe fe-home"></i> <span>About Us</span></a>
							</li>
							<li>
								<a href="{{ url('admin/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fe fe-user"></i> <span>logout</span></a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
							</li>
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Market Registration</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('seller')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Market Registration</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<!-- Row -->
					<div class="row">
						<div class="col-sm-12">
						

							<!-- Custom Boostrap Validation -->
							<div class="card">

								@if(!is_null($seller))

								<div class="card-header">
									<h5 class="card-title">Hello, your Application is being proccessed, keep in touch</h5>
									<p class="card-text">Application Status, <b>{{$seller->status}}</b></p>
								</div>
								@endif
								@if(is_null($seller))

								<div class="card-header">
									<h5 class="card-title">Custom Registration</h5>
									<p class="card-text">Submit all the required information, by submitting your information you agree with all terms and conditions of the system</p>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-sm">

											
											<form method="post" action="{{url('seller/register/shop')}}" enctype="multipart/form-data">
												@csrf

												@if ($message = Session::get('error'))
												<div class="alert alert-danger alert-block">
													<button type="button" class="close" data-dismiss="alert">×</button>	
														<strong>{{ $message }}</strong>
												</div>
												@endif

												<div class="form-group row">
													<label class="col-form-label col-md-2">Shop name</label>
													<div class="col-md-10">
														<input type="text" name="shop_name" class="form-control @error('shop_name') is-invalid @enderror" required>

														@error('shop_name')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
														@enderror
													</div>
												</div>

												<div class="form-group row">
													<label class="col-form-label col-md-2">Comapany Registration</label>
													<div class="col-md-10">
														<input type="text" name="company_reg" class="form-control @error('company_reg') is-invalid @enderror" required>

														@error('company_reg')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
														@enderror
													</div>
												</div>

												<div class="form-group row">
													<label class="col-form-label col-md-2">email</label>
													<div class="col-md-10">
														<input type="email" name="shop_email" class="form-control @error('shop_email') is-invalid @enderror" required>

														@error('shop_email')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
														@enderror
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label col-md-2">Shop Phone Number</label>
													<div class="col-md-10">
														<input type="text" name="shop_phone_number" class="form-control @error('shop_phone_number') is-invalid @enderror" required>

														@error('shop_phone_number')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
														@enderror
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label col-md-2">Logo</label>
													<div class="col-md-10">
														<input class="form-control @error('shop_logo') is-invalid @enderror" type="file" name="shop_logo" required>

														@error('shop_logo')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
														@enderror
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label col-md-2">Documents</label>
													<div class="col-md-10">
														<input class="form-control @error('shop_document') is-invalid @enderror" type="file" name="shop_document" required>

														@error('shop_document')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
														@enderror
														</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label col-md-2">Category</label>
													<div class="col-md-10">
														<select class="form-control @error('shop_category') is-invalid @enderror" name="shop_category" required>
															<option>-- Select --</option>
															<option value="electronics">Electronics</option>
															<option value="clothing">Clothing</option>
															<option value="food">Food</option>
															<option value="furniture">Furniture</option>
														</select>

														@error('shop_category')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
														@enderror
													</div>
												</div>
												<div class="form-group row">
													<label class="col-form-label col-md-2">Shop Description</label>
													<div class="col-md-10">
														<textarea rows="5" cols="5" class="form-control @error('shop_description') is-invalid @enderror" placeholder="Enter Description" name="shop_description" required></textarea>

														@error('shop_description')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
														@enderror
													</div>
												</div>

												<div class="form-group row">
													<div class="col-md-12 text-center">
														<button type="submit" class="btn btn-primary center">Provision</button>
													</div>
												</div>
											</form>
											@else

											


										</div>
									</div>
								</div>
								@endif
							</div>
							<!-- /Custom Boostrap Validation -->
						</div>
					</div>
					<!-- /Row -->
				
				</div>
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
	
		
@endsection
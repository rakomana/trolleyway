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
				
				<div class="top-nav-search">
					<form>
						<input type="text" class="form-control" placeholder="Search here">
						<button class="btn" type="submit"><i class="fa fa-search"></i></button>
					</form>
				</div>
				
				<!-- Mobile Menu Toggle -->
				<a class="mobile_btn" id="mobile_btn">
					<i class="fa fa-bars"></i>
				</a>
				<!-- /Mobile Menu Toggle -->
				
				<!-- Header Right Menu -->
				<ul class="nav user-menu">

					<!-- App Lists -->
					<li class="nav-item dropdown app-dropdown">
						<a class="nav-link dropdown-toggle" aria-expanded="false" role="button" data-toggle="dropdown" href="#"><i class="fe fe-app-menu"></i></a>
						<ul class="dropdown-menu app-dropdown-menu">
							<li>
								<div class="app-list">
									<div class="row">
										<div class="col"><a class="app-item" href="{{url('seller/inbox')}}"><i class="fa fa-envelope"></i><span>Email</span></a></div>
										<div class="col"><a class="app-item" href="{{url('seller/calendar')}}"><i class="fa fa-calendar"></i><span>Calendar</span></a></div>
										<div class="col"><a class="app-item" href="{{url('seller/chat')}}"><i class="fa fa-comments"></i><span>Chat</span></a></div>
									</div>
								</div>
							</li>
						</ul>
					</li>
					<!-- /App Lists -->
					
					<!-- Notifications -->
					<li class="nav-item dropdown noti-dropdown">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<i class="fe fe-bell"></i> <span class="badge badge-pill">3</span>
						</a>
						<div class="dropdown-menu notifications">
							<div class="topnav-dropdown-header">
								<span class="notification-title">Notifications</span>
								<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
							</div>
							<div class="noti-content">
								<ul class="notification-list">
									<li class="notification-message">
										<a href="#">
											<div class="media">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image" src="{{asset('manager\assets\img\profiles\avatar-02.jpg')}}">
												</span>
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">Carlson Tech</span> has approved <span class="noti-title">your estimate</span></p>
													<p class="noti-time"><span class="notification-time">4 mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="#">
											<div class="media">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image" src="{{asset('manager\assets\img\profiles\avatar-11.jpg')}}">
												</span>
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">International Software Inc</span> has sent you a invoice in the amount of <span class="noti-title">$218</span></p>
													<p class="noti-time"><span class="notification-time">6 mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="#">
											<div class="media">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image" src="{{asset('manager\assets\img\profiles\avatar-17.jpg')}}">
												</span>
												<div class="media-body">
												<p class="noti-details"><span class="noti-title">John Hendry</span> sent a cancellation request <span class="noti-title">Apple iPhone XR</span></p>
												<p class="noti-time"><span class="notification-time">8 mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="#">
											<div class="media">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image" src="{{asset('manager\assets\img\profiles\avatar-13.jpg')}}">
												</span>
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">Mercury Software Inc</span> added a new product <span class="noti-title">Apple MacBook Pro</span></p>
													<p class="noti-time"><span class="notification-time">12 mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
								</ul>
							</div>
							<div class="topnav-dropdown-footer">
								<a href="#">View all Notifications</a>
							</div>
						</div>
					</li>
					<!-- /Notifications -->
					
					<!-- User Menu -->
					<li class="nav-item dropdown has-arrow">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<span class="user-img"><img class="rounded-circle" src="{{asset('manager\assets\img\profiles\avatar-01.jpg')}}" width="31" alt="Ryan Taylor"></span>
						</a>
						<div class="dropdown-menu">
							<div class="user-header">
								<div class="avatar avatar-sm">
									<img src="{{asset('manager\assets\img\profiles\avatar.png')}}" alt="User Image" class="avatar-img rounded-circle">
								</div>
								<div class="user-text">
									<h6>{{Auth::user('seller')->name}}</h6>
									<p class="text-muted mb-0">Seller</p>
								</div>
							</div>
							<a class="dropdown-item" href="{{url('seller/profile')}}">My Profile</a>
							<a class="dropdown-item" href="{{url('seller/profile')}}">Account Settings</a>
							<a class="dropdown-item" href="{{url('seller/logout')}}">Logout</a>
						</div>
					</li>
					<!-- /User Menu -->
					
				</ul>
				<!-- /Header Right Menu -->
				
            </div>
			<!-- /Header -->
			
			<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Guinea Fowl</span>
							</li>
							<li> 
								<a href="{{url('seller')}}"><i class="fe fe-home"></i> <span>Contact Us</span></a>
							</li>
							<li> 
								<a href="{{url('seller')}}"><i class="fe fe-home"></i> <span>About Us</span></a>
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
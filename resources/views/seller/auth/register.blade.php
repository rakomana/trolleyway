@extends('seller.layouts.app')

	@section('content')
	
		<!-- Main Wrapper -->
        <div class="main-wrapper login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                    	<div class="login-left">
							<img class="img-fluid" src="{{asset('user\assets\images\logo.png')}}" alt="Logo">
                        </div>
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Seller Register</h1>
								<p class="account-subtitle">Access to our dashboard</p>
								
								<!-- Form -->
								<form method="POST" action="{{url('seller/register')}}">
									@csrf

									@if ($message = Session::get('error'))
									<div class="alert alert-danger alert-block">
										<button type="button" class="close" data-dismiss="alert">×</button>	
											<strong>{{ $message }}</strong>
									</div>
									@endif

									<div class="form-group">
										<input name="name" class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Name" required>

										@error('name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
									<div class="form-group">
										<input name="email" class="form-control @error('email') is-invalid @enderror" type="email" placeholder="Email" required>

										@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
									<div class="form-group">
										<input name="password" class="form-control @error('password') is-invalid @enderror" type="password" placeholder="Password" required>

										@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
									<div class="form-group">
										<input name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" type="password" placeholder="Confirm Password" required>

										@error('password_confirmation')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
									<div class="form-group mb-0">
										<button class="btn btn-primary btn-block" type="submit">Register</button>
									</div>
								</form>
								<!-- /Form -->
								
								<div class="login-or">
									<span class="or-line"></span>
									<span class="span-or">or</span>
								</div>
								
								<!-- Social Login -->
								<div class="social-login">
									<span>Register with</span>
									<a href="#" class="facebook"><i class="fa fa-facebook"></i></a><a href="#" class="google"><i class="fa fa-google"></i></a>
								</div>
								<!-- /Social Login -->
								
								<div class="text-center dont-have">Already have an account? <a href="{{url('seller\login')}}">Login</a></div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->
		
	@endsection
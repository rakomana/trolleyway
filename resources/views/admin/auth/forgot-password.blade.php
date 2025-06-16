@extends('admin.layouts.app')

	@section('content')
	
		<!-- Main Wrapper -->
        <div class="main-wrapper login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                    	<div class="login-left">
							<img class="img-fluid" src="{{asset('/user/assets/img/logo/logo.png')}}" alt="Logo">
                        </div>
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Forgot Password?</h1>
								<p class="account-subtitle">Enter your email to get a password reset link</p>
								
								<!-- Form -->
								<form method="POST" action="{{ url('password/email') }}">
									@csrf
									<div class="form-group">
										<input name="email" class="form-control @error('email') is-invalid @enderror" type="text" placeholder="Email">

									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
									</div>
									<div class="form-group mb-0">
										<button class="btn btn-primary btn-block" type="submit">Send Password Reset Link</button>
									</div>
								</form>
								<!-- /Form -->
								
								<div class="text-center dont-have">Remember your password? <a href="{{url('admin/login')}}">Login</a></div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->
		
@endsection
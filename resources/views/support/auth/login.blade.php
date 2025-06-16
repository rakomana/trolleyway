@extends('support.layouts.app')

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
								<h1>Support Login</h1>
								<p class="account-subtitle">Access to our dashboard</p>
								
								<!-- Form -->
								<form method="POST" action="{{url('support/login')}}">
									@csrf

									@if ($message = Session::get('error'))
									<div class="alert alert-danger alert-block">
										<button type="button" class="close" data-dismiss="alert">×</button>	
											<strong>{{ $message }}</strong>
									</div>
									@endif

									<div class="form-group">
										<input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" required>

										@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
									<div class="form-group">
										<input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" required>

										@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>

									<div class="form-group">
										<button class="btn btn-primary btn-block" type="submit">Login</button>
									</div>
								</form>
								<!-- /Form -->
								
								<div class="text-center forgotpass"><a href="{{url('support/forgot/password')}}">Forgot Password?</a></div>
								  
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->
		
	@endsection
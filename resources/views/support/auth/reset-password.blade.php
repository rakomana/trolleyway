@extends('seller.layouts.app')

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
								<p class="account-subtitle">Forgot your Password?</p>
								
								<!-- Form -->
								<form method="POST" action="{{url('seller/login')}}">
									@csrf

									@if ($message = Session::get('error'))
									<div class="alert alert-danger alert-block">
										<button type="button" class="close" data-dismiss="alert">×</button>	
											<strong>{{ $message }}</strong>
									</div>
									@endif

									<div class="form-group">
										<input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="New-Password" required>

										@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>

                                    <div class="form-group">
										<input class="form-control @error('confirm_password') is-invalid @enderror" type="password" name="confirm_password" placeholder="Retype New-Password" required>

										@error('confirm_password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
									<div class="form-group">
										<button class="btn btn-primary btn-block" type="submit">Submit</button>
									</div>
								</form>
								<!-- /Form -->
								
								<div class="text-center dont-have">Don’t have an account? <a href="{{url('seller\register')}}">Register</a></div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->
		
	@endsection
@extends('support.layouts.app')

	@section('content')
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
			
			<div class="error-box">
				<h1>Success!</h1>
				<p class="h4 font-weight-normal">Well done</p>
				<a href="{{url('support/sellers')}}" class="btn btn-primary">Back to Home</a>
			</div>
		
        </div>
		<!-- /Main Wrapper -->
		
@endsection
@extends('support.layouts.app')

	@section('content')
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
			
			<div class="error-box">
				<h1>ERROR</h1>
				<h3 class="h2 mb-3"><i class="fa fa-warning"></i> Something went wrong!</h3>
				<p class="h4 font-weight-normal">Retry to create the list</p>
				<a href="{{url('support/form-basic-inputs')}}" class="btn btn-primary">Create List</a>
			</div>
		
        </div>
		<!-- /Main Wrapper -->
		
@endsection
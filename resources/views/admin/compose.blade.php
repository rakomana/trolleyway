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
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Compose</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('admin')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Compose</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-lg-3 col-md-4">
							<x-admin.menu/>
						</div>
						<div class="col-lg-9 col-md-8">
							<div class="card">
								<div class="card-body">
										<div class="form-group">
											<input type="email" id="myInput" onchange="emails()" placeholder="To" class="form-control">
										</div>
										<div class="form-group">
											<input type="text" id="subject" placeholder="Subject" class="form-control">
										</div>
										<div class="form-group">
											<label for="select_template">Select Email template</label>
											<select id="select_template" type="text" placeholder="Subject" class="form-control">
												<option value="1">Yes</option>
												<option value="0">No</option>
											</select>
										</div>
										<div id="template_section" class="form-group">
											<label for="template">Templates</label>
											<select id="template" type="text" placeholder="Subject" class="form-control">
												<option>Select template</option>
											</select>
										</div>
										<div class="form-group">
											<textarea id="email_body" rows="4" class="form-control summernote" placeholder="Enter your message here"></textarea>
										</div>
										<div class="form-group mb-0">
											<div class="text-center">
												<button onclick="sendEmail()" class="btn btn-primary"><i class="fa fa-send m-r-5"></i> <span>Send</span></button>
												<button class="btn btn-success m-l-5" type="button"> <i class="fa fa-floppy-o m-r-5"></i> <span>Draft</span></button>
												<button class="btn btn-danger m-l-5" type="button"> <i class="fa fa-trash-o m-r-5"></i><span>Delete</span></button>
											</div>
										</div>
								</div>
							</div>
						</div>
					</div>
				</div>			
			</div>
			<!-- /Main Wrapper -->
        </div>
		<!-- /Main Wrapper -->
@endsection
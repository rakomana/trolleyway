@extends('support.layouts.app')

	@section('content')
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
							<!-- Header -->
							<x-support.header/>
							<!-- Header -->
							
							<!-- Sidebar -->
							<x-support.sidebar/>
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
									<li class="breadcrumb-item"><a href="{{url('support')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Compose</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-lg-3 col-md-4">
							<ul class="inbox-menu">
								<li class="active">
									<a href="#"><i class="fa fa-download"></i> Inbox <span class="mail-count">(5)</span></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-star-o"></i> Important</a>
								</li>
								<li>
									<a href="#"><i class="fa fa-paper-plane-o"></i> Sent Mail</a>
								</li>
								<li>
									<a href="#"><i class="fa fa-file-text-o"></i> Drafts <span class="mail-count">(13)</span></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-trash-o"></i> Trash</a>
								</li>
							</ul>
						</div>
						<div class="col-lg-9 col-md-8">
							<div class="card">
								<div class="card-body">
									<form action="{{url('inbox')}}">
										<div class="form-group">
											<input type="email" placeholder="To" class="form-control">
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<input type="email" placeholder="Cc" class="form-control">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<input type="email" placeholder="Bcc" class="form-control">
												</div>
											</div>
										</div>
										<div class="form-group">
											<input type="text" placeholder="Subject" class="form-control">
										</div>
										<div class="form-group">
											<textarea rows="4" class="form-control summernote" placeholder="Enter your message here"></textarea>
										</div>
										<div class="form-group mb-0">
											<div class="text-center">
												<button class="btn btn-primary"><i class="fa fa-send m-r-5"></i> <span>Send</span></button>
												<button class="btn btn-success m-l-5" type="button"> <i class="fa fa-floppy-o m-r-5"></i> <span>Draft</span></button>
												<button class="btn btn-danger m-l-5" type="button"> <i class="fa fa-trash-o m-r-5"></i><span>Delete</span></button>
											</div>
										</div>
									</form>
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
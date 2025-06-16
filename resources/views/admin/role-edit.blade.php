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
								<h3 class="page-title">Role Info</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('admin')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Role Info</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="profile-menu">
								<ul class="nav nav-tabs nav-tabs-solid">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#password_tab">Permissions</a>
									</li>
								</ul>
							</div>	
							<div class="tab-content profile-tab-cont">
								
								<!-- Role Details Tab -->
								<div class="tab-pane fade show active" id="per_details_tab">
								
									<!-- Role Details -->
									<div class="row">
										<div class="col-lg-9">
											<div class="card">
												<div class="card-body">
													<h5 class="card-title d-flex justify-content-between">
														<span>Role Details</span> 
														<a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a>
													</h5>
													<div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Role Name</p>
														<p class="col-sm-9">{{$role->guard_name}}</p>
													</div>
												</div>
											</div>
											
											
										</div>

									</div>
									<!-- /Role Details -->

								</div>
								<!-- /Personal Details Tab -->
								
								<!-- Change Password Tab -->
								<div id="password_tab" class="tab-pane fade">
								
									<!-- Role Details -->
									<div class="row">
										<div class="col-lg-9">
											<div class="card">
												<div class="card-body">
													<h5 class="card-title d-flex justify-content-between">
														<span>Permissions</span> 
														<a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a>
													</h5>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
														<p class="col-sm-4">{{$role->guard_name}}</p>
                                                        <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Description</p>
														<p class="col-sm-4">{{$role->guard_name}}</p>
													</div>
												</div>
											</div>
											
											
										</div>

									</div>
									<!-- /Role Details -->
								</div>
								<!-- /Change Password Tab -->
								
							</div>
						</div>
					</div>
				
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
		<script>
			const App = new Vue({
				el: "#implement",
				data: {
					loading: false,
					form: {
						name: null,
						email: null,
					},
				},
				methods: {
					submitFileAndData() {
		
					this.loading = true;
					axios
						.post("/admin/account", this.form)
						.then((response) => {
							this.loading = false;
							this.form.email = null
							this.form.name = null
							swal("Well done!", "Account update!", "success");
						})
						.catch((error) => {
							this.loading = false;
							swal("Oops!", "Something is wrong!", "warning");
					});
				}
			}
			});
		</script>		
@endsection
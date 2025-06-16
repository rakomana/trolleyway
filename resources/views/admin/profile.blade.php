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
								<h3 class="page-title">Profile</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('admin')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Profile</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="profile-header">
								<div class="row align-items-center">
									<div class="col-auto profile-image">
										<a href="#">
											<img class="rounded-circle" alt="User Image" src="{{asset('manager\assets\img\profiles\avatar.png')}}">
										</a>
									</div>
									<div class="col ml-md-n2 profile-user-info">
										<h4 class="user-name mb-0">{{$admin->name}}</h4>
									</div>
								</div>
							</div>
							<div class="profile-menu">
								<ul class="nav nav-tabs nav-tabs-solid">
									<li class="nav-item">
										<a class="nav-link " data-toggle="tab" href="#per_details_tab">About</a>
									</li>
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#password_tab">Password</a>
									</li>
								</ul>
							</div>	
							<div class="tab-content profile-tab-cont">
								
								<!-- Personal Details Tab -->
								<div class="tab-pane fade" id="per_details_tab">
								
									<!-- Personal Details -->
									<div class="row">
										<div class="col-lg-9">
											<div class="card">
												<div class="card-body">
													<h5 class="card-title d-flex justify-content-between">
														<span>Personal Details</span> 
														<a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a>
													</h5>
													<div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
														<p class="col-sm-9">{{$admin->name}}</p>
													</div>
													<div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
														<p class="col-sm-9">{{$admin->email}}</p>
													</div>
												</div>
											</div>
											
											<!-- Edit Details Modal -->
											<div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
												<div class="modal-dialog modal-dialog-centered" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">Personal Details</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<form id="implement" @submit.prevent="submitFileAndData">
																<div class="row form-row">
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Full Name</label>
																			<input type="text" name="name" v-model="form.name" class="form-control" placeholder="John" required>
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Email ID</label>
																			<input type="email" name="email" v-model="form.email" class="form-control" placeholder="johndoe@example.com" required>
																		</div>
																	</div>
																</div>
																<button type="submit" class="btn btn-primary btn-block">Save Changes</button>
															</form>
														</div>
													</div>
												</div>
											</div>
											<!-- /Edit Details Modal -->
											
										</div>

										<div class="col-lg-3">
											
											<!-- Account Status -->
											<div class="card">
												<div class="card-body">
													<h5 class="card-title d-flex justify-content-between">
														<span>Account Status</span>
														<a class="edit-link" href="#"><i class="fa fa-edit mr-1"></i> Edit</a>
													</h5>
													<button class="btn btn-success" type="button"><i class="fe fe-check-verified"></i> Active</button>
												</div>
											</div>
											<!-- /Account Status -->

											
										</div>
									</div>
									<!-- /Personal Details -->

								</div>
								<!-- /Personal Details Tab -->
								
								<!-- Change Password Tab -->
								<div id="password_tab" class="tab-pane fade show active">
								
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">Change Password</h5>
											<div class="row">
												<div class="col-md-10 col-lg-6">

													<form method="post" action="{{url('admin/account/change-password')}}">
														@csrf

														@if ($message = Session::get('error'))
														<div class="alert alert-danger alert-block">
															<button type="button" class="close" data-dismiss="alert">×</button>	
																<strong>{{ $message }}</strong>
														</div>
														@endif

														@if ($message = Session::get('success'))
														<div class="alert alert-success alert-block">
															<button type="button" class="close" data-dismiss="alert">×</button>	
																<strong>{{ $message }}</strong>
														</div>
														@endif

														<div class="form-group">
															<label>Old Password</label>
															<input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror">

															@error('old_password')
															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
															@enderror

														</div>
														<div class="form-group">
															<label>New Password</label>
															<input name="password" type="password" class="form-control @error('password') is-invalid @enderror">

															@error('password')
															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
															@enderror
														</div>
														<div class="form-group">
															<label>Confirm Password</label>
															<input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror">

															@error('password_confirmation')
															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
															@enderror
														</div>
														<button class="btn btn-primary" type="submit">Save Changes</button>
													</form>

												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /Change Password Tab -->
								<h2>Activity</h2>
								<div class="table-responsive">
									<table class="table table-hover table-center mb-0">
										<thead>
											<tr>
												<th>Device</th>
												<th>Location</th>
												<th>Date</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($logs as $log)
											<tr>
												<td>
													{{ json_decode($log->user_information)->user_device }}
												</td>
												<td>
													@if( (json_decode($log->user_information)->user_location))
														{{json_decode($log->user_information)->user_location->cityName}},&nbsp;
														{{json_decode($log->user_information)->user_location->regionName}},&nbsp;
														{{json_decode($log->user_information)->user_location->countryName}}
														@else
													<p>null</p>
													@endif
												</td>
												<td>{{$log->created_at}}</td>
					
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
								
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
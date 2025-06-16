@extends('seller.layouts.app')

	@section('content')		
		<!-- Main Wrapper -->
        <div class="main-wrapper">
							<!-- Header -->
							<x-seller.header/>
							<!-- Header -->
							
							<!-- Sidebar -->
							<x-seller.sidebar/>
							<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">User Management</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('seller')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">User Management &nbsp;&nbsp;<a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Add</a></li>
								</ul>
							</div>
						</div>
					</div>

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
				
					<div class="row">
						<div class="col-sm-12">
						
							<div class="card card-table">
								<div class="card-header">
									<h4 class="card-title">List of Users</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Name</th>
													<th>Email</th>
													<th>Role</th>
													<th>Created at</th>
													<th class="text-right">Action</th>
												</tr>
											</thead>
											<tbody>
												@foreach($sellers as $seller)
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="{{url('seller/profile')}}" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('manager\assets\img\profiles\avatar.png')}}" alt="User Image"></a>
															<a href="{{url('seller/profile')}}">{{$seller->name}} <span>#0001</span></a>
														</h2>
													</td>
													<td>{{$seller->email}}</td>
													<td></td>
													<td>{{$seller->created_at}}</td>
													<td class="text-right">
														<div class="actions">
															<a href="{{url('seller/edit-user/'.$seller->id)}}" class="btn btn-sm bg-success-light mr-2">
																<i class="fe fe-pencil"></i> Edit
															</a>
															<a href="{{url('seller/user/'.$seller->id)}}" class="btn btn-sm bg-danger-light">
																<i class="fe fe-trash"></i> Delete
															</a>
														</div>
													</td>
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
			</div>
			<!-- /Page Wrapper -->

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
																<button type="submit" class="btn btn-primary btn-block">Save</button>
															</form>

														</div>
													</div>
												</div>
											</div>
										<!-- /Edit Details Modal -->
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
						.post("/seller/register/user", this.form)
						.then((response) => {
							this.loading = false;
							this.form.email = null
							this.form.name = null
							swal("Well done!", "Seller registered to the shop!", "success");
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
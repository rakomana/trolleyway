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
				
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Role Management</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('admin')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Role Management &nbsp;&nbsp;<a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Add</a></li>
								</ul>
							</div>
						</div>
					</div>
				
					<div class="row">
						<div class="col-sm-12">
						
							<div class="card card-table">
								<div class="card-header">
									<h4 class="card-title">List of Roles</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Name</th>
													<th>Created at</th>
													<th class="text-right">Action</th>
												</tr>
											</thead>
											<tbody>
												@foreach($roles as $role)
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('manager\assets\img\profiles\avatar.png')}}" alt="User Image"></a>
															<a href="#">{{$role->name}} <span>#0001</span></a>
														</h2>
													</td>
													<td>
														{{$role->created_at}}
													</td>
													<td class="text-right">
														<div class="actions">
															<a href="{{('edit-role/'.$role->id)}}" class="btn btn-sm bg-success-light mr-2">
																<i class="fe fe-pencil"></i> Edit
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
																	<div class="col-12 col-sm-12">
																		<div class="form-group">
																			<label>Role</label>
																			<input type="text" name="name" v-model="form.name" class="form-control" placeholder="Admin" required>
																		</div>
																		<div class="form-group">
																			<label>Select Permissions</label>
																			<select type="text" name="name" v-model="form.permission" class="form-control" placeholder="Select Permissions">
																				@foreach($permissions as $permission)
																					<option value="{{$permission->description}}">{{$permission->description}}</option>
																				@endforeach
																			</select>
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
						permission: null,
					},
				},
				methods: {
					submitFileAndData() {
		
					this.loading = true;
					axios
						.post("/admin/role", this.form)
						.then((response) => {
							this.loading = false;
							this.form.permission = null
							this.form.name = null
							swal("Well done!", "admin registered to the shop!", "success");
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
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
								<h3 class="page-title">Admin Management</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('admin')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Admin Management &nbsp;&nbsp;<a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Add</a></li>
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
									<h4 class="card-title">List of Admins</h4>
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
												@foreach($admins as $admin)
												<tr>
													<td>
														<h2 class="table-avatar">
															<a href="#" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('manager\assets\img\profiles\avatar.png')}}" alt="User Image"></a>
															<a href="#">{{$admin->name}} <span>#0001</span></a>
														</h2>
													</td>
													<td>{{$admin->email}}</td>
													<td></td>
													<td>{{$admin->created_at}}</td>
													<td class="text-right">
														<div class="actions">
															<a href="{{url('admin/edit-admin/'.$admin->id)}}" class="btn btn-sm bg-success-light mr-2">
																<i class="fe fe-pencil"></i> Edit
															</a>
															<a href="{{url('admin/block/admin/'.$admin->id)}}" class="btn btn-sm bg-danger-light">
																<i class="fe fe-trash"></i>
																@if($admin->status == 'Approved')
																Block
																@else
																Unblock
																@endif
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

															<form method="POST" action="{{url('/admin/register/user')}}">
																@csrf
																<div class="row form-row">
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Full Name</label>
																			<input type="text" name="name" class="form-control" placeholder="John" required>
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Email ID</label>
																			<input type="email" name="email" class="form-control" placeholder="johndoe@example.com" required>
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
@endsection
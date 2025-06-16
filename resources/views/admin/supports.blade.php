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
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Supports</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('admin')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Supports&nbsp;&nbsp;<a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Add</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
				
					<div class="row">
						<div class="col-sm-12">
						
							<div class="card card-table">
								<div class="card-header">
									<h4 class="card-title">List of Supports</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center">
											<thead>
												<tr>
													<th>ID</th>
													<th>Support</th>
													<th>Contact</th>
													<th class="text-right">Action</th>
												</tr>
											</thead>
											<tbody>
												@foreach($supports as $support)
												<tr>
													<td>{{$support->id}}</td>
													<td>{{$support->name}}</td>
													<td>{{$support->email}}</td>
													<td class="text-right">
														<div class="actions">
															<a href="{{url('admin/edit-support/'.$support->id)}}" class="btn btn-sm bg-success-light mr-2">
																<i class="fe fe-pencil"></i> Edit
															</a>
															<a href="{{url('admin/block/support/'.$support->id)}}" class="btn btn-sm bg-danger-light">
																<i class="fe fe-trash"></i>
																@if($support->status == 'Approved')
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
			
																		<form method="POST" action="{{url('/admin/support')}}">
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
		<!-- /Main Wrapper -->
		
@endsection
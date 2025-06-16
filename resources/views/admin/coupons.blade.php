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
								<h3 class="page-title">Coupon Management</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('admin')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Coupon Management &nbsp;&nbsp;<a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Add</a></li>
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
									<h4 class="card-title">List of Coupons</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center mb-0">
											<thead>
												<tr>
													<th>Code</th>
													<th>Type</th>
													<th>Value</th>
													<th>Created at</th>
												</tr>
											</thead>
											<tbody>
												@foreach($coupons as $coupon)
												<tr>
													<td>{{$coupon->code}}</td>
													<td>{{$coupon->type}}</td>
													<td>{{$coupon->value}}</td>
													<td>{{$coupon->created_at}}</td>
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
															<h5 class="modal-title">Coupon Details</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">

															<form method="POST" action="{{url('/admin/coupon')}}">
																@csrf
																<div class="row form-row">
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Code</label>
																			<input type="text" name="code" class="form-control" required>
																		</div>
																	</div>
																	<div class="col-12 col-sm-6">
																		<div class="form-group">
																			<label>Type</label>
																			<select type="text" name="type" class="form-control" required>
																				<option value="fixed">Fixed</option>
																				<option value="percent">Percentage</option>
																			</select>
																		</div>
																	</div>
																	<div class="col-12 col-sm-12">
																		<div class="form-group">
																			<label>Value</label>
																			<input type="text" name="value" class="form-control" required>
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
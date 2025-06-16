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
								<h3 class="page-title">Adminstrators</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('admin')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Adminstrators</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
				
					<div class="row">
						<div class="col-sm-12">
						
							<div class="card card-table">
								<div class="card-header">
									<h4 class="card-title">List of Adminstrators</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center">
											<thead>
												<tr>
													<th>ID</th>
													<th>Admin</th>
													<th>Contact Person</th>
													<th class="text-right">Action</th>
												</tr>
											</thead>
											<tbody>
												@foreach($admins as $admins)
												<tr>
													<td>{{$admins->id}}</td>
													<td>
														<a href="{{url('admin/profile')}}" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('manager\assets\img\profiles\avatar.png')}}" alt="User Image"></a>
														{{$admins->name}}</td>
													<td>{{$admins->email}}</td>
													<td class="text-right">
														<div class="actions">
															<a href="{{url('admin/edit-admin/'.$admins->id)}}" class="btn btn-sm bg-success-light mr-2">
																<i class="fe fe-pencil"></i> Edit
															</a>
															<a href="{{url('admin/block/admin/'.$admins->id)}}" class="btn btn-sm bg-danger-light">
																<i class="fe fe-trash"></i>
																@if($admins->status == 'Approved')
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
			
        </div>
		<!-- /Main Wrapper -->
		
@endsection
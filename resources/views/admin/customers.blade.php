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
								<h3 class="page-title">Customers</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('admin')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Customers</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
				
					<div class="row">
						<div class="col-sm-12">
						
							<div class="card card-table">
								<div class="card-header">
									<h4 class="card-title">List of Customers</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center">
											<thead>
												<tr>
													<th>ID</th>
													<th>Customer</th>
													<th>Email</th>
													<th>Provider</th>
													<th class="text-right">Action</th>
												</tr>
											</thead>
											<tbody>
												@foreach($users as $user)
												<tr>
													<td>{{$user->id}}</td>
													<td>
														<a href="{{url('admin/profile')}}" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('manager\assets\img\profiles\avatar.png')}}" alt="User Image"></a>
														{{$user->name}}</td>
													<td>{{$user->email}}</td>
													<td>{{$user->provider}}</td>
													<td class="text-right">
														<div class="actions">
															<a href="{{url('admin/edit-customer/'.$user->id)}}" class="btn btn-sm bg-success-light mr-2">
																<i class="fe fe-pencil"></i> Edit
															</a>
															<a href="{{url('admin/block/customer/'.$user->id)}}" class="btn btn-sm bg-danger-light">
																<i class="fe fe-trash"></i>
																@if($user->status == 'Approved')
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
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
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Sellers</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('support')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Sellers</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
				
					<div class="row">
						<div class="col-sm-12">
						
							<div class="card card-table">
								<div class="card-header">
									<h4 class="card-title">List of Sellers</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center">
											<thead>
												<tr>
													<th>ID</th>
													<th>Seller</th>
													<th>Email</th>
													<th class="text-right">Action</th>
												</tr>
											</thead>
											<tbody>
												@foreach($sellers as $seller)
												<tr>
													<td>{{$seller->id}}</td>
													<td>
														<a href="{{url('support/profile')}}" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('manager\assets\img\profiles\avatar.png')}}" alt="User Image"></a>
														{{$seller->name}}</td>
													<td>{{$seller->email}}</td>
													<td class="text-right">
														<div class="actions">
															<a href="{{url('support/seller/'.$seller->id)}}" class="btn btn-sm bg-success-light mr-2">
																<i class="fe fe-pencil"></i> Edit
															</a>
															<a href="{{url('support/block/seller/'.$seller->id)}}" class="btn btn-sm bg-danger-light">
																<i class="fe fe-trash"></i> 
																@if($seller->status == 'Approved')
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
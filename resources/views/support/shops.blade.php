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
								<h3 class="page-title">Markets</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('support')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Markets</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
				
					<div class="row">
						<div class="col-sm-12">
						
							<div class="card card-table">
								<div class="card-header">
									<h4 class="card-title">List of Markets</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center">
											<thead>
												<tr>
													<th>ID</th>
													<th>Shop Name</th>
													<th>Shop Description</th>
													<th>Email</th>
													<th>Contact</th>
													<th>Category</th>
													<th>Reg no</th>
													<th>FICA</th>
													<th>Logo</th>
													<th>Status</th>
													<th class="text-right">Action</th>
												</tr>
											</thead>
											<tbody>
												@foreach($markets as $market)
												<tr>
													<td>{{$market->id}}</td>
													<td>{{$market->shop_name}}</td>
													<td>{{$market->shop_description}}</td>
													<td>{{$market->shop_email}}</td>
													<td>{{$market->shop_phone_number}}</td>
													<td>{{$market->shop_category}}</td>
													<td>{{$market->company_reg}}</a></td>
													<td><a href="{{asset('uploads/documents/'.$market->shop_document)}}" download>{{$market->shop_document}}</a></td>
													<td><a href="{{asset('uploads/logos/'.$market->shop_logo)}}" download>{{$market->shop_logo}}</a></td>
													<td>{{$market->status}}</td>
													<td class="text-right">
														<div class="actions">
															<a href="{{url('support/edit-shop/'.$market->id)}}" class="btn btn-sm bg-success-light mr-2">
																<i class="fe fe-pencil"></i> Edit
															</a>
															<a href="{{url('support/block/shop/'.$market->id)}}" class="btn btn-sm bg-danger-light">
																<i class="fe fe-trash"></i> 
																Update
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
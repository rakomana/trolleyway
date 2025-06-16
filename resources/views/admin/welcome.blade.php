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
							<div class="col-sm-12">
								<h3 class="page-title">Welcome Admin!</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Dashboard</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<div class="row">
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon bg-primary">
											<i class="fe fe-users"></i>
										</span>
										<div class="dash-count">
											<i class="fa fa-arrow-up text-success"></i> 17%
										</div>
									</div>
									<div class="dash-widget-info">
										<h3>{{count($users)}}</h3>
										<h6 class="text-muted">Customers</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-primary w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon bg-success">
											<i class="fe fe-money"></i>
										</span>
										<div class="dash-count">
											<i class="fa fa-arrow-down text-danger"></i> 12%
										</div>
									</div>
									<div class="dash-widget-info">
										<h3>{{count($shops)}}</h3>
										<h6 class="text-muted">Markets</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-success w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon bg-danger">
											<i class="fe fe-credit-card"></i>
										</span>
										<div class="dash-count">
											<i class="fa fa-arrow-down text-danger"></i> 12%
										</div>
									</div>
									<div class="dash-widget-info">
										<h3>{{count($pending)}}</h3>
										<h6 class="text-muted">Orders</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-danger w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon bg-warning">
											<i class="fe fe-folder"></i>
										</span>
										<div class="dash-count">
											<i class="fa fa-arrow-up text-success"></i> 17%
										</div>
									</div>
									<div class="dash-widget-info">
										<h3>{{count($products)}}</h3>
										<h6 class="text-muted">Products</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-warning w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 col-lg-6">
						
							<!-- Sales Chart -->
							<div class="card card-chart">
								<div class="card-header">
									<h4 class="card-title">Completed Orders ({{count($completed)}})</h4>
								</div>
								<div class="card-body">
									<div id="morrisArea"></div>
								</div>
							</div>
							<!-- /Sales Chart -->
							
						</div>
						<div class="col-md-12 col-lg-6">
						
							<!-- Invoice Chart -->
							<div class="card card-chart">
								<div class="card-header">
									<h4 class="card-title">Pending Orders ({{count($pending)}})</h4>
								</div>
								<div class="card-body">
									<div id="morrisLine"></div>
								</div>
							</div>
							<!-- /Invoice Chart -->
							
						</div>	
					</div>
					
					<div class="row">
						<div class="col-md-6 d-flex">
						
							<!-- Recent Orders -->
							<div class="card card-table flex-fill">
								<div class="card-header">
									<h4 class="card-title">Recent Orders</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center">
											<thead>
												<tr>
													<th>Item</th>
													<th>Date</th>
													<th class="text-center">Quantity</th>
													<th class="text-center">Status</th>
													<th class="text-right">Product</th>
												</tr>
											</thead>
											<tbody>
												@foreach($pending->slice(0, 5) as $complete)
												<tr>
													<td class="text-nowrap">
														<div class="font-weight-600">
															{{$complete->id}}
														</div>
													</td>
													<td class="text-nowrap">
														<?php
															echo date("d-m-Y", strtotime($complete->updated_at));
														?>
													</td>
													<td class="text-center">{{$complete->quantity}}</td>
													<td class="text-center">
														<span class="badge badge-pill bg-success inv-badge">{{$complete->status}}</span>
													</td>
													<td class="text-right">
														<div class="font-weight-600">{{$complete->product_id}}</div>
													</td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- /Recent Orders -->
							
						</div>
						<div class="col-md-6 d-flex">
						
							<!-- Feed Activity -->
							<div class="card flex-fill">
								<div class="card-header">
									<h4 class="card-title">Feed Activity</h4>
								</div>
								<div class="card-body">
									<ul class="activity-feed">
										@foreach($products->slice(0, 5) as $product)
										<li class="feed-item">
											<div class="feed-date">
												<?php
													echo date("d-m-Y", strtotime($product->updated_at));
												?>
											</div>
											<span class="feed-text"><a href="{{url('admin/profile')}}">Seller</a> added new product <a href="{{url('admin/product-details')}}">"{{$product->title}}"</a></span>
										</li>
										@endforeach
									</ul>
								</div>
							</div>
							<!-- /Feed Activity -->
							
						</div>
					</div>
				</div>			
			</div>
    	<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
		
@endsection
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
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Welcome to {{$shop->shop_name}}</h3>
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
										<h3>{{count($products)}}</h3>
										<h6 class="text-muted">Products</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-success w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						@can('view revenue')
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon bg-success">
											<form method="POST" action="{{url('seller/wallet')}}">
												@csrf
												<button type="submit" class="btn btn-default">Send</button>
											</form>
										</span>
										<div class="dash-count">
											<i class="fa fa-arrow-down text-danger"></i> 12%
										</div>
									</div>
									<div class="dash-widget-info">
										<h3>R
											@if(count($sales) > 0)
												<?php $sum = 0; ?>
												@foreach($sales as $sale)
													<?php
														$item = DB::table('products')->whereId($sale->product_id)->first();
														$sub_sum = ($sale->quantity) * ($item->new_price);
														$sum = $sum + $sub_sum;
													?>
												@endforeach
												{{$sum}}
												
											@else
												{{0}}
											@endif
										</h3>
										<h6 class="text-muted">Sales</h6>
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
										<h3>R
											@if(count($revenue) > 0)
												<?php $total = 0; ?>
												@foreach($revenue as $rev)
													<?php
														$product = DB::table('products')->whereId($rev->product_id)->first();
														$sub_total = ($rev->quantity) * ($product->new_price);
														$total = $total + $sub_total;
													?>
												@endforeach
												{{$total}}
											@else
												{{0}}
											@endif
										</h3>
										<h6 class="text-muted">Revenue</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-warning w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						@endcan
					</div>

					<div class="row">
						<div class="col-md-12 col-lg-6">
						
							<!-- Sales Chart -->
							<div class="card card-chart">
								<div class="card-header">
									<h4 class="card-title">Completed Orders ({{count($complete)}})</h4>
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
													<th class="text-right">Price</th>
												</tr>
											</thead>
											<tbody>
												@foreach($pending->slice(0, 5) as $order)
												<?php
													$user = DB::table('users')->whereId($order->user_id)->first();
													$item = DB::table('products')->whereId($order->product_id)->first();
													$shop = DB::table('shops')->whereId($item->shop_id)->first();
													$address = DB::table('addresses')->whereId($user->address_id)->first();
												?>
												<tr>
													<td class="text-nowrap">
														<div class="font-weight-600">{{$item->title}}</div>
													</td>
													<td class="text-nowrap">{{$order->created_at}}</td>
													<td class="text-center">{{$order->quantity}}</td>
													<td class="text-center">
														<span class="badge badge-pill bg-success inv-badge">{{$order->status}}</span>
													</td>
													<td class="text-right">
														<div class="font-weight-600">R{{$item->new_price}}</div>
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
										@foreach($users as $user)
										<li class="feed-item">
											<div class="feed-date">Apr 13</div>
											<span class="feed-text"><a href="{{url('seller/profile')}}">{{$user->name}}</a> added new product <a href="{{url('seller/product-details')}}">"Smart Watch"</a></span>
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
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
				
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Orders</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('support')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Orders</li>
								</ul>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card card-table">
								<div class="card-header">
									<h4 class="card-title">Orders</h4>
								</div>
                                <div class="card-body">
									<div class="table-responsive">
                                        <table class="table mb-0 table-hover">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Item(s)</th>
                                                    <th>Shipment</th>
                                                    <th>Amount</th>
                                                    <th>Quantity</th>
                                                    <th>Total</th>
                                                    <th>Status</th>
                                                    <th>Track</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($orders as $order)
                                                <tr>
                                                    <?php
                                                        $user = DB::table('users')->whereId($order->user_id)->first();
                                                        $item = DB::table('products')->whereId($order->product_id)->first();
                                                        $shop = DB::table('shops')->whereId($item->shop_id)->first();
                                                        $address = DB::table('addresses')->whereId($user->address_id)->first();
                                                    ?>
                                                    <td><img src="{{asset('user/assets/images/user.png')}}" height="50px;" width="50px;">{{$user->name}}<br>
                                                        <small>{{$user->email}}</small>
                                                    </td>
                                                    <td>
                                                        <a href="{{url('admin/order-details/'.$order->id)}}">
                                                            <?php $count = 0; ?>
                                                            @foreach(json_decode($item->image, true) as $image)
                                                                <?php if($count == 1) break; ?>
                                                                <img src="{{Storage::cloud()->url($image)}}" height="50px;" width="50px;">
                                                                <?php $count++; ?>
                                                            @endforeach
                                                            {{$item->title}}<br>
                                                            <small>R{{$item->new_price}} | {{$item->status}} | {{$item->category}} | {{$shop->shop_name}}</small>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <small>{{$address->first_name}}&nbsp;{{$address->last_name}}</small>,<br>
                                                        <small>{{$address->email}}</small>,<br>
                                                        <small>{{$address->phone_number}}</small>,<br>
                                                        @if($address->type == 'pep')
                                                            <small>{{$address->store}}</small>
                                                        @else
                                                            <small>{{$address->address}}</small>,<br>
                                                            <small>{{$address->unit}}</small>
                                                        @endif
                                                    </td>
                                                    <td>R{{$item->new_price}}</td>
                                                    <td>{{$order->quantity}}</td>
                                                    <td>R{{($item->new_price) * ($order->quantity)}}</td>
                                                    <td><span class="badge badge-success">{{$order->status}}</span></td>
                                                    <td>{{$order->track}}</td>
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
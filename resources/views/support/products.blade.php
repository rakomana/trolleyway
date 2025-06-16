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
						<div class="row">
							<div class="col">
								<h3 class="page-title">Products</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('support')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Products</li>
									&nbsp;&nbsp;&nbsp;<a href="{{url('support/form-basic-inputs')}}" class="btn btn-primary">Add</a>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
					@foreach($products as $product)
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="product">
								<div class="product-inner">
									<?php $count = 0; ?>
									@foreach(json_decode($product->image, true) as $image)
										<?php if($count == 1) break; ?>
										<img alt="alt" src="{{Storage::cloud()->url($image)}}">
										<?php $count++; ?>
									@endforeach
									<div class="cart-btns">
										<a href="{{url('support/product-details/'.$product->id)}}" class="btn btn-primary addcart-btn">View</a>
									
									</div>
								</div>
								<div class="pro-desc">
									<h5><a href="{{url('support/product-details/'.$product->id)}}">{{$product->title}}</a></h5>
									<div class="price">R{{$product->new_price}}.00</div>
								</div>
							</div>
						</div>
					@endforeach
					</div>
				
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
		
@endsection
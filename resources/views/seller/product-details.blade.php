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
				
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Product Details</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('seller')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Product Details</li>
								</ul>
							</div>
						</div>
					</div>
					
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-6 col-sm-12">
									<div class="product-view">
										<div class="proimage-wrap">
											<div class="pro-image" id="pro_popup">
												<?php $count = 0; ?>
												@foreach(json_decode($product->image, true) as $image)
													<?php if($count == 1) break; ?>
													<a href="{{Storage::cloud()->url($image)}}">
														<img class="img-fluid" src="{{Storage::cloud()->url($image)}}" alt="Product Image">
													</a>
													<?php $count++; ?>
												@endforeach
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-sm-12">
									<div class="product-info">
										<h2>{{$product->title}}</h2>
										<p class="mb-0">Product ID: {{uniqid()}}</p>
										<div class="rating">
											<p>
												<span><i class="fa fa-star rated"></i></span>
												<span><i class="fa fa-star rated"></i></span>
												<span><i class="fa fa-star rated"></i></span>
												<span><i class="fa fa-star rated"></i></span>
												<span><i class="fa fa-star-o "></i></span>
												<span>/ Reviews (3)</span>
											</p>
										</div>
										<p class="product_price">R{{$product->new_price}}</p>
										<p><b>Availability:</b> {{$product->status}}</p>
										<div>
											<button type="button" class="btn btn-primary">
												<i class="fa fa-delete"></i> Delete
											</button>
										</div>
									</div>
								</div>
								<div class="col-sm-12">
									<ul class="nav nav-tabs nav-tabs-bottom">
										<li class="nav-item"><a class="nav-link active" href="#product_desc" data-toggle="tab">Description</a></li>
										<li class="nav-item"><a class="nav-link" href="#product_reviews" data-toggle="tab">Reviews</a></li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane show active" id="product_desc">
											<div class="product-content">
												<p>{{$product->description}}</p>
											</div>
										</div>
										<div class="tab-pane" id="product_reviews">
											<div class="product-reviews">
												<h4 class="mb-3">Reviews (3)</h4>
												<ul class="review-list">
													<li>
														<div class="review">
															<div class="review-author">
																<img class="avatar" alt="User Image" src="{{asset('manager\assets\img\profiles\avatar.png')}}">
															</div>
															<div class="review-block">
																<div class="review-by">
																	<span class="review-author-name">Mark Boydston</span>
																	<div class="rating">
																		<i class="fa fa-star rated"></i>
																		<i class="fa fa-star rated"></i>
																		<i class="fa fa-star rated"></i>
																		<i class="fa fa-star rated"></i>
																		<i class="fa fa-star-o"></i>
																	</div>
																</div>
																<p>With great power comes great capability</p>
																<span class="review-date">Feb 6, 2019</span>
															</div>
														</div>
													</li>
													<li>
														<div class="review">
															<div class="review-author">
																<img class="avatar" alt="User Image" src="{{asset('manager\assets\img\profiles\avatar.png')}}">
															</div>
															<div class="review-block">
																<div class="review-by">
																	<span class="review-author-name">Tori Carter</span>
																	<div class="rating">
																		<i class="fa fa-star rated"></i>
																		<i class="fa fa-star rated"></i>
																		<i class="fa fa-star rated"></i>
																		<i class="fa fa-star rated"></i>
																		<i class="fa fa-star rated"></i>
																	</div>
																</div>
																<p>True value for money</p>
																<span class="review-date">Jan 29, 2019</span>
															</div>
														</div>
													</li>
													<li>
														<div class="review">
															<div class="review-author">
																<img class="avatar" alt="User Image" src="{{asset('manager\assets\img\profiles\avatar.png')}}">
															</div>
															<div class="review-block">
																<div class="review-by">
																	<span class="review-author-name">Julie Rodriguez</span>
																	<div class="rating">
																		<i class="fa fa-star rated"></i>
																		<i class="fa fa-star rated"></i>
																		<i class="fa fa-star rated"></i>
																		<i class="fa fa-star-o"></i>
																		<i class="fa fa-star-o"></i>
																	</div>
																</div>
																<p>Excellent quality and Excellent Battery Backup</p>
																<span class="review-date">Dec 13, 2018</span>
															</div>
														</div>
													</li>
												</ul>
												<div class="all-reviews">
													<button type="button" class="btn btn-primary">View All Reviews</button>
												</div>
											</div>
											<div class="product-write-review">
												<h4 class="mb-3">Write Review</h4>
												<form>
													<div class="row">
														<div class="col-sm-8">
															<div class="form-group">
																<label>Name <span class="text-red">*</span></label>
																<input type="text" class="form-control">
															</div>
															<div class="form-group">
																<label>Your email address <span class="text-red">*</span></label>
																<input type="email" class="form-control">
															</div>
															<div class="form-group">
																<label>Rating <span class="text-red">*</span></label>
																<div class="rating">
																	<i class="fa fa-star rated"></i>
																	<i class="fa fa-star rated"></i>
																	<i class="fa fa-star rated"></i>
																	<i class="fa fa-star rated"></i>
																	<i class="fa fa-star-o"></i>
																</div>
															</div>
															<div class="form-group">
																<label>Review Comments</label>
																<textarea rows="4" class="form-control"></textarea>
															</div>
															<div class="review-submit">
																<input type="submit" value="Submit" class="btn">
															</div>
														</div>
													</div>
												</form>
											</div>
										</div>
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
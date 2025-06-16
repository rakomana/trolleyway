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
							<div class="col">
								<h3 class="page-title"></h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('admin')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Edit Product</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Edit Product</h4>
								</div>
								<div class="card-body">

									<form method="POST" action="{{('/admin/product/edit/'.$product->id)}}">
										@csrf
										@if ($message = Session::get('success'))
										<div class="alert alert-success alert-block">
											<button type="button" class="close" data-dismiss="alert">×</button>	
												<strong>{{ $message }}</strong>
										</div>
										@endif

										<div class="form-group row">
											<label class="col-form-label col-md-2">Market</label>
											<div class="col-md-10">
												<select type="text" name="title" class="form-control @error('title') is-invalid @enderror" required>
													@foreach($shops as $shop)
													<option value="{{$shop->id}}">{{$shop->shop_name}}</option>
													@endforeach
												</select>
												@error('title')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror
											</div>
										</div>

										<div class="form-group row">
											<label class="col-form-label col-md-2">Title</label>
											<div class="col-md-10">
												<input type="text" name="title" value="{{$product->title}}" class="form-control @error('title') is-invalid @enderror" required>

												@error('title')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-2">Meta Title</label>
											<div class="col-md-10">
												<input type="text" name="meta_title" value="{{$product->meta_title}}" class="form-control @error('meta_title') is-invalid @enderror" required>

												@error('meta_title')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-2">Name</label>
											<div class="col-md-10">
												<input type="text" name="name" value="{{$product->name}}" class="form-control @error('name') is-invalid @enderror" required>

												@error('name')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-2">Original Price</label>
											<div class="col-md-10">
												<input type="text" name="old_price" value="{{$product->old_price}}" class="form-control @error('old_price') is-invalid @enderror" required>

												@error('old_price')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-2">New Price</label>
											<div class="col-md-10">
												<input type="text" name="new_price" value="{{$product->new_price}}" class="form-control @error('new_price') is-invalid @enderror" required>

												@error('new_price')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror
											</div>
										</div>

										<div class="form-group row">
											<label class="col-form-label col-md-2">Video</label>
											<div class="col-md-10">
												<input type="text" name="youtube_link" value="{{$product->youtube_link}}" class="form-control @error('youtube_link') is-invalid @enderror" required>

												@error('youtube_link')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror
											</div>
										</div>

										<div class="form-group row">
											<label class="col-form-label col-md-2">Quantity</label>
											<div class="col-md-10">
												<input type="number" name="quantity" value="{{$product->quantity}}" class="form-control @error('quantity') is-invalid @enderror" required>

												@error('quantity')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-2">Category</label>
											<div class="col-md-10">
												<select class="form-control @error('category') is-invalid @enderror" name="category" required>
													<option value="null">{{$product->category}}</option>
													<option value="electronics">Electronics</option>
													<option value="clothing">Clothing</option>
													<option value="food">Food</option>
													<option value="furniture">Furniture</option>
												</select>

												@error('category')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-2">Description</label>
											<div class="col-md-10">
												<textarea name="description" value="{{$product->description}}" rows="5" cols="5" class="form-control @error('description') is-invalid @enderror" placeholder="{{$product->description}}" ></textarea>

												@error('description')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror
											</div>
										</div>

										<div class="form-group row">
											<label class="col-form-label col-md-2">Meta Description</label>
											<div class="col-md-10">
												<textarea name="meta_description" value="{{$product->meta_description}}" rows="5" cols="5" class="form-control @error('meta_description') is-invalid @enderror" placeholder="{{$product->meta_description}}"></textarea>

												@error('meta_description')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror
											</div>
										</div>

										<div class="form-group row">
											<div class="col-md-12 text-center">
												<button type="submit" class="btn btn-primary center">Update</button>
											</div>
										</div>
									</form>

								</div>
							</div>
						</div>
					</div>
				
				</div>			
			</div>
			<!-- /Main Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->		
@endsection
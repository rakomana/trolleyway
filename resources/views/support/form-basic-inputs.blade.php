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
								<h3 class="page-title">{{$support->shop_name}}</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('support')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Add Product</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Add Product</h4>
								</div>
								<div class="card-body">

									<form @submit.prevent="submitFileAndData" id="implement">
										@csrf

										@if ($message = Session::get('error'))
										<div class="alert alert-danger alert-block">
											<button type="button" class="close" data-dismiss="alert">×</button>	
												<strong>{{ $message }}</strong>
										</div>
										@endif

										<div class="form-group row">
											<label class="col-form-label col-md-2">Title</label>
											<div class="col-md-10">
												<input type="text" name="title" v-model="form.title" class="form-control @error('title') is-invalid @enderror" required>

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
												<input type="text" name="meta_title" v-model="form.meta_title" class="form-control @error('meta_title') is-invalid @enderror" required>

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
												<input type="text" name="name" v-model="form.name" class="form-control @error('name') is-invalid @enderror" required>

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
												<input type="text" name="old_price" v-model="form.old_price" class="form-control @error('old_price') is-invalid @enderror" required>

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
												<input type="text" name="new_price" v-model="form.new_price" class="form-control @error('new_price') is-invalid @enderror" required>

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
												<input type="text" name="youtube_link" v-model="form.youtube_link" class="form-control @error('youtube_link') is-invalid @enderror" required>

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
												<input type="number" name="quantity" v-model="form.quantity" class="form-control @error('quantity') is-invalid @enderror" required>

												@error('quantity')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-2">Product</label>
											<div class="col-md-10">
												<input class="form-control @error('image') is-invalid @enderror" type="file" name="image" ref="image" v-on:change="handleFileImageUpload()" multiple required>

												@error('image')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror
											</div>
										</div>
										<div class="form-group row">
											<label class="col-form-label col-md-2">Category</label>
											<div class="col-md-10">
												<select class="form-control @error('category') is-invalid @enderror" name="category" v-model="form.category" required>
													<option value="null">-- Select --</option>
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
												<textarea name="description" v-model="form.description" rows="5" cols="5" class="form-control @error('description') is-invalid @enderror" placeholder="Enter description here" required></textarea>

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
												<textarea name="meta_description" v-model="form.meta_description" rows="5" cols="5" class="form-control @error('meta_description') is-invalid @enderror" placeholder="Enter meta description" required></textarea>

												@error('meta_description')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror
											</div>
										</div>

										<div class="form-group row">
											<div class="col-md-12 text-center">
												<button type="submit" class="btn btn-primary center">Provision</button>
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

		<script>
			const App = new Vue({
				el: "#implement",
				data: {
					loading: false,
					image: "",
					form: {
						title: null,
						meta_description: null,
						meta_title: null,
						description: null,
						old_price: null,
						new_price: null,
						quantity: null,
						youtube_link: null,
						status: null,
						name: null,
						category: null,
						url: null
					},
				},
				methods: {
					handleFileImageUpload() {
					this.image = this.$refs.image.files[0];
					},
					submitFileAndData() {
					let formData = new FormData();
		
					formData.append("title", this.form.title);
					formData.append("meta_description", this.form.meta_description);
					formData.append("meta_title", this.form.meta_title);
					formData.append("description", this.form.description);
					formData.append("old_price", this.form.old_price);
					formData.append("new_price", this.form.new_price);
					formData.append("quantity", this.form.quantity);
					formData.append("youtube_link", this.form.youtube_link);
					formData.append("status", this.form.status);
					formData.append("name", this.form.name);
					formData.append("category", this.form.category);
					formData.append("url", this.form.url);
					formData.append("image", this.image)
		
					this.loading = true;
					axios
						.post("/support/shop/product", formData, {
						headers: {
							"Content-Type": "multipart/form-data",
						},
						})
						.then((response) => {
							window.location.href = '/support/product-success';
							this.loading = false;
						})
						.catch((error) => {
							window.location.href = '/support/product-fail';
							this.loading = false;
					});
				}
			}
			});
		</script>
		
@endsection
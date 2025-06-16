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
									<li class="breadcrumb-item active">Add a Campaign</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Add a Campaign</h4>
								</div>
								<div class="card-body">

									<form action="{{url('admin/campaign')}}" method="POST" enctype="multipart/form-data">
										@csrf

										@if ($message = Session::get('success'))
										<div class="alert alert-success alert-block">
											<button type="button" class="close" data-dismiss="alert">×</button>	
												<strong>{{ $message }}</strong>
										</div>
										@endif


										<div class="form-group row">
											<label class="col-form-label col-md-2">Message</label>
											<div class="col-md-10">
												<textarea name="message" rows="5" cols="5" class="form-control @error('message') is-invalid @enderror" placeholder="Enter message here...." required></textarea>

												@error('message')
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
						.post("/admin/shop/product", formData, {
						headers: {
							"Content-Type": "multipart/form-data",
						},
						})
						.then((response) => {
							window.location.href = '/admin/product-success';
							this.loading = false;
						})
						.catch((error) => {
							window.location.href = '/admin/product-fail';
							this.loading = false;
					});
				}
			}
			});
		</script>
		
@endsection
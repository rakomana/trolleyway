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
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Blog&nbsp;&nbsp;<a class="btn btn-primary" href="{{url('admin/add-blog')}}"><span style="color: white;">Add Blog</span></a></h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('admin')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Blog</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
				
					<div class="row">
						<div class="col-sm-12">
						
							<div class="card card-table">
								<div class="card-header">
									<h4 class="card-title">List of Blogs</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center">
											<thead>
												<tr>
													<th>Title</th>
													<th>Author</th>
													<th>First Paragraph</th>
													<th>Second Paragraph</th>
													<th>Description</th>
													<th>Image</th>
													<th class="text-right">Action</th>
												</tr>
											</thead>
											<tbody>
												@foreach($blogs as $blog)
												<tr>
													<td>{{$blog->title}}</td>
													<td>{{$blog->author}}</td>
													<td>{{$blog->description_1}}</td>
													<td>{{$blog->description_2}}</td>
													<td><a href="{{asset('uploads/blog/'.$blog->image)}}" download>{{$blog->image}}</a></td>
													<td class="text-right">
														<div class="actions">
															<a href="{{url('admin/edit-shop/'.$blog->id)}}" class="btn btn-sm bg-success-light mr-2">
																<i class="fe fe-pencil"></i> Edit
															</a>
															<a href="{{url('admin/block/shop/'.$blog->id)}}" class="btn btn-sm bg-danger-light">
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
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
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Customers</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('seller')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Customers</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
				
					<div class="row">
						<div class="col-sm-12">
						
							<div class="card card-table">
								<div class="card-header">
									<h4 class="card-title">List of Customers</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-hover table-center">
											<thead>
												<tr>
													<th>ID</th>
													<th>Customer</th>
													<th>Contact Person</th>
													<th>Email</th>
													<th>Sales</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>#CUS0001</td>
													<td><a href="#">Carlson Tech</a></td>
													<td>Betty Carlson</td>
													<td>bettycarlson@example.com</td>
													<td>$1821</td>
												</tr>
												<tr>
													<td>#CUS0002</td>
													<td><a href="#">Delta Infotech</a></td>
													<td>Tressa Wexler</td>
													<td>tressawexler@example.com</td>
													<td>$7358</td>
												</tr>
												<tr>
													<td>#CUS0003</td>
													<td><a href="#">Global Technologies</a></td>
													<td>Barry Cuda</td>
													<td>barrycuda@example.com</td>
													<td>$752</td>
												</tr>
												<tr>
													<td>#CUS0004</td>
													<td><a href="#">International Software Inc</a></td>
													<td>Walter Weaver</td>
													<td>walterweaver@example.com</td>
													<td>$22354</td>
												</tr>
												<tr>
													<td>#CUS0005</td>
													<td><a href="#">Mercury Software Inc</a></td>
													<td>Amanda Warren</td>
													<td>amandawarren@example.com</td>
													<td>$6547</td>
												</tr>
												<tr>
													<td>#CUS0006</td>
													<td><a href="#">Gutmann Inc</a></td>
													<td>Keith Williams</td>
													<td>keithwilliams@example.com</td>
													<td>$618</td>
												</tr>
												<tr>
													<td>#CUS0007</td>
													<td><a href="#">Corkery Ltd</a></td>
													<td>Thomas Norwood</td>
													<td>thomasnorwood@example.com</td>
													<td>$1204</td>
												</tr>
												<tr>
													<td>#CUS0008</td>
													<td><a href="#">Cartwright LLC</a></td>
													<td>Jason Dimartino</td>
													<td>jasondimartino@example.com</td>
													<td>$3258</td>
												</tr>
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
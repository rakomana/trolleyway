﻿@extends('admin.layouts.app')

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
				
					<!-- Invoice Container -->
					<div class="invoice-container">
						
						<div class="row">
							<div class="col-sm-6 m-b-20">
								<img alt="Logo" class="inv-logo img-fluid" src="{{asset('/user/assets/img/logo/logo.png')}}">
							</div>
							<div class="col-sm-6 m-b-20">
								<div class="invoice-details">
									<h3 class="text-uppercase">Invoice #INV-0001</h3>
									<ul class="list-unstyled mb-0">
										<li>Date: <span>March 12, 2019</span></li>
										<li>Due date: <span>April 25, 2019</span></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 m-b-20">
								<ul class="list-unstyled mb-0">
									<li>Dreamguy's Technologies</li>
									<li>3864 Quiet Valley Lane,</li>
									<li>Sherman Oaks, CA, 91403</li>
									<li>GST No:</li>
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 col-lg-7 col-xl-8 m-b-20">
								<h6>Invoice to</h6>
								<ul class="list-unstyled mb-0">
									<li><h5 class="mb-0"><strong>Barry Cuda</strong></h5></li>
									<li><span>Global Technologies</span></li>
									<li>5754 Airport Rd</li>
									<li>Coosada, AL, 36020</li>
									<li>United States</li>
									<li>888-777-6655</li>
									<li><a href="#">barrycuda@example.com</a></li>
								</ul>
							</div>
							<div class="col-sm-6 col-lg-5 col-xl-4 m-b-20">
								<h6>Payment Details</h6>
								<ul class="list-unstyled invoice-payment-details mb-0">
									<li><h5>Total Due: <span class="text-right">$8,750</span></h5></li>
									<li>Bank name: <span>Profit Bank Europe</span></li>
									<li>Country: <span>United Kingdom</span></li>
									<li>City: <span>London E1 8BF</span></li>
									<li>Address: <span>3 Goodman Street</span></li>
									<li>IBAN: <span>KFH37784028476740</span></li>
									<li>SWIFT code: <span>BPT4E</span></li>
								</ul>
							</div>
						</div>
						
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>#</th>
										<th>ITEM</th>
										<th class="d-none d-sm-table-cell">DESCRIPTION</th>
										<th class="text-nowrap">UNIT COST</th>
										<th>QTY</th>
										<th>TOTAL</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>Android Application</td>
										<td class="d-none d-sm-table-cell">Lorem ipsum dolor sit amet, consectetur adipiscing elit</td>
										<td>$1000</td>
										<td>2</td>
										<td>$2000</td>
									</tr>
									<tr>
										<td>2</td>
										<td>Ios Application</td>
										<td class="d-none d-sm-table-cell">Lorem ipsum dolor sit amet, consectetur adipiscing elit</td>
										<td>$1750</td>
										<td>1</td>
										<td>$1750</td>
									</tr>
									<tr>
										<td>3</td>
										<td>Codeigniter Project</td>
										<td class="d-none d-sm-table-cell">Lorem ipsum dolor sit amet, consectetur adipiscing elit</td>
										<td>$90</td>
										<td>3</td>
										<td>$270</td>
									</tr>
									<tr>
										<td>4</td>
										<td>Phonegap Project</td>
										<td class="d-none d-sm-table-cell">Lorem ipsum dolor sit amet, consectetur adipiscing elit</td>
										<td>$1200</td>
										<td>2</td>
										<td>$2400</td>
									</tr>
									<tr>
										<td>5</td>
										<td>Website Optimization</td>
										<td class="d-none d-sm-table-cell">Lorem ipsum dolor sit amet, consectetur adipiscing elit</td>
										<td>$200</td>
										<td>2</td>
										<td>$400</td>
									</tr>
								</tbody>
							</table>
						</div>
						
						<div>
							<div class="row invoice-payment">
								<div class="col-sm-7">
								</div>
								<div class="col-sm-5">
									<div class="m-b-20">
										<h6>Total due</h6>
										<div class="table-responsive no-border">
											<table class="table mb-0">
												<tbody>
													<tr>
														<th>Subtotal:</th>
														<td class="text-right">$7,000</td>
													</tr>
													<tr>
														<th>Tax: <span class="text-regular">(25%)</span></th>
														<td class="text-right">$1,750</td>
													</tr>
													<tr>
														<th>Total:</th>
														<td class="text-right text-primary"><h5>$8,750</h5></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="invoice-info">
								<h5>Other information</h5>
								<p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed dictum ligula, cursus blandit risus. Maecenas eget metus non tellus dignissim aliquam ut a ex. Maecenas sed vehicula dui, ac suscipit lacus. Sed finibus leo vitae lorem interdum, eu scelerisque tellus fermentum. Curabitur sit amet lacinia lorem. Nullam finibus pellentesque libero.</p>
							</div>
						</div>
						
					</div>
					<!-- /Invoice Container -->
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
			
        </div>
		<!-- /Main Wrapper -->
		
@endsection
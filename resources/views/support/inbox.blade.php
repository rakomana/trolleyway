﻿@extends('support.layouts.app')

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
								<h3 class="page-title">Inbox</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{url('support')}}">Dashboard</a></li>
									<li class="breadcrumb-item active">Inbox</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-lg-3 col-md-4">
							<div class="compose-btn">
								<a href="{{url('support/compose')}}" class="btn btn-primary btn-block">
								Compose
								</a>
							</div>
							<ul class="inbox-menu">
								<li class="active">
									<a href="#"><i class="fa fa-download"></i> Inbox <span class="mail-count">(5)</span></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-star-o"></i> Important</a>
								</li>
								<li>
									<a href="#"><i class="fa fa-paper-plane-o"></i> Sent Mail</a>
								</li>
								<li>
									<a href="#"><i class="fa fa-file-text-o"></i> Drafts <span class="mail-count">(13)</span></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-trash-o"></i> Trash</a>
								</li>
							</ul>
						</div>
						
						<div class="col-lg-9 col-md-8">
							<div class="card">
								<div class="card-body">
									<div class="email-header">
										<div class="row">
											<div class="col top-action-left">
												<div class="float-left">
													<div class="btn-group dropdown-action">
														<button type="button" class="btn btn-white dropdown-toggle" data-toggle="dropdown">Select <i class="fa fa-angle-down "></i></button>
														<div class="dropdown-menu">
															<a class="dropdown-item" href="#">All</a>
															<a class="dropdown-item" href="#">None</a>
															<div class="dropdown-divider"></div> 
															<a class="dropdown-item" href="#">Read</a>
															<a class="dropdown-item" href="#">Unread</a>
														</div>
													</div>
													<div class="btn-group dropdown-action">
														<button type="button" class="btn btn-white dropdown-toggle" data-toggle="dropdown">Actions <i class="fa fa-angle-down "></i></button>
														<div class="dropdown-menu">
															<a class="dropdown-item" href="#">Reply</a>
															<a class="dropdown-item" href="#">Forward</a>
															<a class="dropdown-item" href="#">Archive</a>
															<div class="dropdown-divider"></div> 
															<a class="dropdown-item" href="#">Mark As Read</a>
															<a class="dropdown-item" href="#">Mark As Unread</a>
															<div class="dropdown-divider"></div> 
															<a class="dropdown-item" href="#">Delete</a>
														</div>
													</div>
													<div class="btn-group dropdown-action">
														<button type="button" class="btn btn-white dropdown-toggle" data-toggle="dropdown"><i class="fa fa-folder"></i> <i class="fa fa-angle-down"></i></button>
														<div role="menu" class="dropdown-menu">
															<a class="dropdown-item" href="#">Social</a>
															<a class="dropdown-item" href="#">Forums</a>
															<a class="dropdown-item" href="#">Updates</a>
															<div class="dropdown-divider"></div> 
															<a class="dropdown-item" href="#">Spam</a>
															<a class="dropdown-item" href="#">Trash</a>
															<div class="dropdown-divider"></div> 
															<a class="dropdown-item" href="#">New</a>
														</div>
													</div>
													<div class="btn-group dropdown-action">
														<button type="button" data-toggle="dropdown" class="btn btn-white dropdown-toggle"><i class="fa fa-tags"></i> <i class="fa fa-angle-down"></i></button>
														<div role="menu" class="dropdown-menu">
															<a class="dropdown-item" href="#">Work</a>
															<a class="dropdown-item" href="#">Family</a>
															<a class="dropdown-item" href="#">Social</a>
															<div class="dropdown-divider"></div> 
															<a class="dropdown-item" href="#">Primary</a>
															<a class="dropdown-item" href="#">Promotions</a>
															<a class="dropdown-item" href="#">Forums</a>
														</div>
													</div>
													<div class="btn-group dropdown-action mail-search">
														<input type="text" placeholder="Search Messages" class="form-control search-message">
													</div>
												</div>
											</div>
											<div class="col-auto top-action-right">
												<div class="text-right">
													<button type="button" title="Refresh" data-toggle="tooltip" class="btn btn-white d-none d-md-inline-block"><i class="fa fa-refresh"></i></button>
													<div class="btn-group">
														<a class="btn btn-white"><i class="fa fa-angle-left"></i></a>
														<a class="btn btn-white"><i class="fa fa-angle-right"></i></a>
													</div>
												</div>
												<div class="text-right">
													<span class="text-muted d-none d-md-inline-block">Showing 10 of 112 </span>
												</div>
											</div>
										</div>
									</div>
									<div class="email-content">
										<div class="table-responsive">
											<table class="table table-inbox table-hover">
												<thead>
													<tr>
														<th colspan="6">
															<input type="checkbox" class="checkbox-all">
														</th>
													</tr>
												</thead>
												<tbody>
													<tr class="unread clickable-row" data-href="{{url('support/mail-view')}}">
														<td>
															<input type="checkbox" class="checkmail">
														</td>
														<td><span class="mail-important"><i class="fa fa-star starred"></i></span></td>
														<td class="name">John Doe</td>
														<td class="subject">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</td>
														<td><i class="fa fa-paperclip"></i></td>
														<td class="mail-date">13:14</td>
													</tr>
													<tr class="unread clickable-row" data-href="{{url('support/mail-view')}}">
														<td>
															<input type="checkbox" class="checkmail">
														</td>
														<td><span class="mail-important"><i class="fa fa-star-o"></i></span></td>
														<td class="name">Envato Account</td>
														<td class="subject">Important account security update from Envato</td>
														<td></td>
														<td class="mail-date">8:42</td>
													</tr>
													<tr class="clickable-row" data-href="{{url('support/mail-view')}}">
														<td>
															<input type="checkbox" class="checkmail">
														</td>
														<td><span class="mail-important"><i class="fa fa-star-o"></i></span></td>
														<td class="name">Twitter</td>
														<td class="subject">HRMS Bootstrap support Template</td>
														<td></td>
														<td class="mail-date">30 Nov</td>
													</tr>
													<tr class="unread clickable-row" data-href="{{url('support/mail-view')}}">
														<td>
															<input type="checkbox" class="checkmail">
														</td>
														<td><span class="mail-important"><i class="fa fa-star-o"></i></span></td>
														<td class="name">Richard Parker</td>
														<td class="subject">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</td>
														<td></td>
														<td class="mail-date">18 Sep</td>
													</tr>
													<tr class="clickable-row" data-href="{{url('support/mail-view')}}">
														<td>
															<input type="checkbox" class="checkmail">
														</td>
														<td><span class="mail-important"><i class="fa fa-star-o"></i></span></td>
														<td class="name">John Smith</td>
														<td class="subject">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</td>
														<td></td>
														<td class="mail-date">21 Aug</td>
													</tr>
													<tr class="clickable-row" data-href="{{url('support/mail-view')}}">
														<td>
															<input type="checkbox" class="checkmail">
														</td>
														<td><span class="mail-important"><i class="fa fa-star-o"></i></span></td>
														<td class="name">me, Robert Smith (3)</td>
														<td class="subject">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</td>
														<td></td>
														<td class="mail-date">1 Aug</td>
													</tr>
													<tr class="unread clickable-row" data-href="{{url('support/mail-view')}}">
														<td>
															<input type="checkbox" class="checkmail">
														</td>
														<td><span class="mail-important"><i class="fa fa-star-o"></i></span></td>
														<td class="name">Codecanyon</td>
														<td class="subject">Welcome To Codecanyon</td>
														<td></td>
														<td class="mail-date">Jul 13</td>
													</tr>
													<tr class="clickable-row" data-href="{{url('support/mail-view')}}">
														<td>
															<input type="checkbox" class="checkmail">
														</td>
														<td><span class="mail-important"><i class="fa fa-star-o"></i></span></td>
														<td class="name">Richard Miles</td>
														<td class="subject">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</td>
														<td><i class="fa fa-paperclip"></i></td>
														<td class="mail-date">May 14</td>
													</tr>
													<tr class="unread clickable-row" data-href="{{url('support/mail-view')}}">
														<td>
															<input type="checkbox" class="checkmail">
														</td>
														<td><span class="mail-important"><i class="fa fa-star-o"></i></span></td>
														<td class="name">John Smith</td>
														<td class="subject">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</td>
														<td></td>
														<td class="mail-date">11/11/16</td>
													</tr>
													<tr class="clickable-row" data-href="{{url('support/mail-view')}}">
														<td>
															<input type="checkbox" class="checkmail">
														</td>
														<td><span class="mail-important"><i class="fa fa-star starred"></i></span></td>
														<td class="name">Mike Litorus</td>
														<td class="subject">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</td>
														<td></td>
														<td class="mail-date">10/31/16</td>
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
			</div>
			<!-- /Main Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
		
@endsection
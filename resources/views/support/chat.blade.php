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
				
					<div class="row">
						<div class="col-sm-12">
							<div class="chat-window">
								<div class="chat-cont-left">
									<div class="chat-header">
										<span>Chats</span>
										<a href="javascript:void(0)" class="chat-compose">
											<i class="material-icons">control_point</i>
										</a>
									</div>
									<form class="chat-search">
										<div class="input-group">
											<div class="input-group-prepend">
												<i class="fa fa-search"></i>
											</div>
											<input type="text" class="form-control" placeholder="Search">
										</div>
									</form>
									<div class="chat-users-list">
										<div class="chat-scroll">
											@foreach($sellers as $seller)
											<a href="javascript:void(0);" class="media">
												<div class="media-img-wrap">
													<div class="avatar avatar-away">
														<img src="{{asset('user\assets\images\user.png')}}" alt="User Image" class="avatar-img rounded-circle">
													</div>
												</div>
												<div class="media-body">
													<div>
														<div class="user-name">{{$seller->name}}</div>
														<div class="user-last-chat">Hey, How are you?</div>
													</div>
													<div>
														<div class="last-chat-time block">2 min</div>
														<div class="badge badge-success badge-pill">15</div>
													</div>
												</div>
											</a>
											@endforeach
										</div>
									</div>
								</div>
								<div class="chat-cont-right">
									<div class="chat-header">
										<a id="back_user_list" href="javascript:void(0)" class="back-user-list">
											<i class="material-icons">chevron_left</i>
										</a>
										<div class="media">
											<div class="media-img-wrap">
												<div class="avatar avatar-online">
													<img src="{{asset('user\assets\images\user.png')}}" alt="User Image" class="avatar-img rounded-circle">
												</div>
											</div>
											<div class="media-body">
												<div class="user-name">{{auth()->user()->name}}</div>
												<div class="user-status">online</div>
											</div>
										</div>
										<div class="chat-options">
											<a href="javascript:void(0)">
												<i class="material-icons">local_phone</i>
											</a>
											<a href="javascript:void(0)">
												<i class="material-icons">videocam</i>
											</a>
											<a href="javascript:void(0)">
												<i class="material-icons">more_vert</i>
											</a>
										</div>
									</div>
									<div class="chat-body">
										<div class="chat-scroll">
											<ul class="list-unstyled">
												<li class="media sent">
													<div class="media-body">
														<div class="msg-box">
															<div>
																<p>Hello. What can I do for you?</p>
																<ul class="chat-msg-info">
																	<li>
																		<div class="chat-time">
																			<span>8:30 AM</span>
																		</div>
																	</li>
																</ul>
															</div>
														</div>
													</div>
												</li>
												<li class="media received">
													<div class="avatar">
														<img src="{{asset('manager\assets\img\profiles\avatar-02.jpg')}}" alt="User Image" class="avatar-img rounded-circle">
													</div>
													<div class="media-body">
														<div class="msg-box">
															<div>
																<p>I'm just looking around.</p>
																<p>Will you tell me something about yourself?</p>
																<ul class="chat-msg-info">
																	<li>
																		<div class="chat-time">
																			<span>8:35 AM</span>
																		</div>
																	</li>
																</ul>
															</div>
														</div>
														<div class="msg-box">
															<div>
																<p>Are you there? That time!</p>
																<ul class="chat-msg-info">
																	<li>
																		<div class="chat-time">
																			<span>8:40 AM</span>
																		</div>
																	</li>
																</ul>
															</div>
														</div>
														<div class="msg-box">
															<div>
																<div class="chat-msg-attachments">
																	<div class="chat-attachment">
																		<img src="{{asset('manager\assets\img\product\product-01.jpg')}}" alt="Product Image">
																		<div class="chat-attach-caption">placeholder.jpg</div>
																		<a href="" class="chat-attach-download">
																			<i class="fa fa-download"></i>
																		</a>
																	</div>
																	<div class="chat-attachment">
																		<img src="{{asset('manager\assets\img\product\product-01.jpg')}}" alt="Product Image">
																		<div class="chat-attach-caption">placeholder.jpg</div>
																		<a href="" class="chat-attach-download">
																			<i class="fa fa-download"></i>
																		</a>
																	</div>
																</div>
																<ul class="chat-msg-info">
																	<li>
																		<div class="chat-time">
																			<span>8:41 AM</span>
																		</div>
																	</li>
																</ul>
															</div>
														</div>
													</div>
												</li>
												<li class="media sent">
													<div class="media-body">
														<div class="msg-box">
															<div>
																<p>Where?</p>
																<ul class="chat-msg-info">
																	<li>
																		<div class="chat-time">
																			<span>8:42 AM</span>
																		</div>
																	</li>
																</ul>
															</div>
														</div>
														<div class="msg-box">
															<div>
																<p>OK, my name is Limingqiang. I like singing, playing basketballand so on.</p>
																<ul class="chat-msg-info">
																	<li>
																		<div class="chat-time">
																			<span>8:42 AM</span>
																		</div>
																	</li>
																</ul>
															</div>
														</div>
														<div class="msg-box">
															<div>
																<div class="chat-msg-attachments">
																	<div class="chat-attachment">
																		<img src="{{asset('manager\assets\img\product\product-01.jpg')}}" alt="Product Image">
																		<div class="chat-attach-caption">placeholder.jpg</div>
																		<a href="" class="chat-attach-download">
																			<i class="fa fa-download"></i>
																		</a>
																	</div>
																</div>
																<ul class="chat-msg-info">
																	<li>
																		<div class="chat-time">
																			<span>8:50 AM</span>
																		</div>
																	</li>
																</ul>
															</div>
														</div>
													</div>
												</li>
												<li class="media received">
													<div class="avatar">
														<img src="{{asset('manager\assets\img\profiles\avatar-02.jpg')}}" alt="User Image" class="avatar-img rounded-circle">
													</div>
													<div class="media-body">
														<div class="msg-box">
															<div>
																<p>You wait for notice.</p>
																<p>Consectetuorem ipsum dolor sit?</p>
																<p>Ok?</p>
																<ul class="chat-msg-info">
																	<li>
																		<div class="chat-time">
																			<span>8:55 PM</span>
																		</div>
																	</li>
																</ul>
															</div>
														</div>
													</div>
												</li>
												<li class="chat-date">Today</li>
												<li class="media received">
													<div class="avatar">
														<img src="{{asset('manager\assets\img\profiles\avatar-02.jpg')}}" alt="User Image" class="avatar-img rounded-circle">
													</div>
													<div class="media-body">
														<div class="msg-box">
															<div>
																<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>
																<ul class="chat-msg-info">
																	<li>
																		<div class="chat-time">
																			<span>10:17 AM</span>
																		</div>
																	</li>
																	<li><a href="#">Edit</a></li>
																</ul>
															</div>
														</div>
													</div>
												</li>
												<li class="media sent">
													<div class="media-body">
														<div class="msg-box">
															<div>
																<p>Lorem ipsum dollar sit</p>
																<div class="chat-msg-actions dropdown">
																	<a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																		<i class="fe fe-elipsis-v"></i>
																	</a>
																	<div class="dropdown-menu dropdown-menu-right">
																		<a class="dropdown-item" href="#">Delete</a>
																	</div>
																</div>
																<ul class="chat-msg-info">
																	<li>
																		<div class="chat-time">
																			<span>10:19 AM</span>
																		</div>
																	</li>
																	<li><a href="#">Edit</a></li>
																</ul>
															</div>
														</div>
													</div>
												</li>
												<li class="media received">
													<div class="avatar">
														<img src="{{asset('manager\assets\img\profiles\avatar-02.jpg')}}" alt="User Image" class="avatar-img rounded-circle">
													</div>
													<div class="media-body">
														<div class="msg-box">
															<div>
																<div class="msg-typing">
																	<span></span>
																	<span></span>
																	<span></span>
																</div>
															</div>
														</div>
													</div>
												</li>
											</ul>
										</div>
									</div>
									<div class="chat-footer">
										<div class="input-group">
											<div class="input-group-prepend">
												<div class="btn-file btn">
													<i class="fa fa-paperclip" aria-hidden="true"></i>
													<input type="file">
												</div>
											</div>
											<input type="text" class="input-msg-send form-control" placeholder="Type something">
											<div class="input-group-append">
												<button type="button" class="btn msg-send-btn"><i class="fa fa-send"></i></button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
		
@endsection
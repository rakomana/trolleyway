			<!-- Header -->
            <div class="header">
			
				<!-- Logo -->
				<div class="header-left">
					<a href="{{url('support')}}" class="logo">
						<img src="{{asset('user\assets\images\logo.png')}}" alt="Logo">
					</a>
					<a href="{{url('support')}}" class="logo logo-small">
						<img src="{{asset('user\assets\images\logo.png')}}" alt="Logo" width="30" height="30">
					</a>
				</div>
				<!-- /Logo -->
				
				<a href="javascript:void(0);" id="toggle_btn">
					<i class="fe fe-text-align-left"></i>
				</a>
				
				<div class="top-nav-search">
					<form>
						<input type="text" class="form-control" placeholder="Search here">
						<button class="btn" type="submit"><i class="fa fa-search"></i></button>
					</form>
				</div>
				
				<!-- Mobile Menu Toggle -->
				<a class="mobile_btn" id="mobile_btn">
					<i class="fa fa-bars"></i>
				</a>
				<!-- /Mobile Menu Toggle -->
				
				<!-- Header Right Menu -->
				<ul class="nav user-menu">

					<!-- App Lists -->
					<li class="nav-item dropdown app-dropdown">
						<a class="nav-link dropdown-toggle" aria-expanded="false" role="button" data-toggle="dropdown" href="#"><i class="fe fe-app-menu"></i></a>
						<ul class="dropdown-menu app-dropdown-menu">
							<li>
								<div class="app-list">
									<div class="row">
										<div class="col"><a class="app-item" href="{{url('support/inbox')}}"><i class="fa fa-envelope"></i><span>Email</span></a></div>
										<div class="col"><a class="app-item" href="{{url('support/calendar')}}"><i class="fa fa-calendar"></i><span>Calendar</span></a></div>
										<div class="col"><a class="app-item" href="{{url('support/chat')}}"><i class="fa fa-comments"></i><span>Chat</span></a></div>
									</div>
								</div>
							</li>
						</ul>
					</li>
					<!-- /App Lists -->
					
					<!-- User Menu -->
					<li class="nav-item dropdown">
						<a href="{{url('support/profile')}}" class="dropdown-toggle nav-link">
							{{Auth::user('support')->name}}
							<span class="user-img"><img class="rounded-circle" src="{{asset('manager\assets\img\profiles\avatar.png')}}" width="31" alt="Ryan Taylor"></span>
						</a>
					</li>
					<!-- /User Menu -->
					
				</ul>
				<!-- /Header Right Menu -->
				
            </div>
			<!-- /Header -->
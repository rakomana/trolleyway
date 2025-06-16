			<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Main</span>
							</li>
							<li class="active"> 
								<a href="{{url('support')}}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-cart"></i> <span> Ecommerce</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{url('support/products')}}">Products</a></li>
									<li><a href="{{url('support/orders')}}">Orders</a></li>
									<li><a href="{{url('support/customers')}}">Customers</a></li>
									<li><a href="{{url('support/sellers')}}">Sellers</a></li>
									<li><a href="{{url('support/markets')}}">Markets</a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-tiled"></i> <span> Application</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a href="{{url('support/chat')}}">Chat</a></li>
									<li><a href="{{url('support/calendar')}}">Calendar</a></li>
									<li><a href="{{url('support/inbox')}}">Email</a></li>
								</ul>
							</li>
							<li>
								<a href="{{ url('support/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fe fe-user"></i> <span>logout</span></a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
							</li>
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->

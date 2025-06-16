<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"> 
                    <span>Main</span>
                </li>
                <li> 
                    <a href="{{url('admin')}}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-cart"></i> <span> Ecommerce</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{url('admin/products')}}">Products</a></li>
                        <li><a href="{{url('admin/orders')}}">Orders</a></li>
                        <li><a href="{{url('admin/customers')}}">Customers</a></li>
                        <li><a href="{{url('admin/sellers')}}">Sellers</a></li>
                        <li><a href="{{url('admin/admins')}}">Admins</a></li>
                        <li><a href="{{url('admin/supports')}}">Support</a></li>
                        <li><a href="{{url('admin/markets')}}">Markets</a></li>
                        <li><a href="{{url('admin/audit')}}">Audit</a></li>
                        <li><a href="{{url('admin/blog')}}">Blog</a></li>
                        <li><a href="{{url('admin/coupons')}}">Coupons</a></li>
                        <li><a href="{{url('admin/campaign')}}">Campaigns</a></li>
                        <li><a href="{{url('admin/subscription')}}">Subscriptions</a></li>
                        <li> 
                            <a href="{{url('admin/users')}}"><i class="fe fa-users"></i> User Management</a>
                        </li>
                        <li> 
                            <a href="{{url('admin/roles')}}"><i class="fe fe-users"></i> Role Management</a>
                        </li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-tiled"></i> <span> Application</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{url('admin/chat')}}">Chat</a></li>
                        <li><a href="{{url('admin/calendar')}}">Calendar</a></li>
                        <li><a href="{{url('admin/inbox')}}">Email</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('admin/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fe fe-user"></i> <span>logout</span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
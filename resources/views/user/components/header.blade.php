<header class="header-style-1"> 
  <!-- ============================================== TOP MENU ============================================== -->
  <div class="top-bar animate-dropdown hidden-xs">
    <div class="container">
      <div class="header-top-inner">
        <div class="cnt-account">
          <ul class="list-unstyled">
            <li><a href="{{url('seller')}}"><i class="icon fa fa-user"></i>Seller</a></li>
            <li><a href="{{url('track-orders')}}"><i class="icon fa fa-check"></i>Track Order(s)</a></li>
            <li><a href="{{url('my-wish-list')}}"><i class="icon fa fa-heart"></i>Wishlist</a></li>
            <li><a href="{{url('shopping-cart')}}"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
            @guest
            <li><a href="{{url('login')}}"><i class="icon fa fa-lock"></i>Login | Register</a></li>
            @else
            <li>
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{auth()->user()->name}} | logout</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            </li>
            @endguest
          </ul>
        </div>
        <!-- /.cnt-cart -->
        <div class="clearfix"></div>
      </div>
      <!-- /.header-top-inner --> 
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.header-top --> 
  <!-- ============================================== TOP MENU : END ============================================== -->
  <div class="main-header" style="background-color: white;">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 logo-holder"> 
          <!-- ============================================================= LOGO ============================================================= -->
          <div class="logo hidden-xs"> <a href="{{url('/')}}"> <img src="{{asset('user\assets\images\logo.png')}}" style="width: 80px; height: 60px;margin-top: -8%" alt="logo"> </a> </div>
          <!-- /.logo --> 
          <!-- ============================================================= LOGO : END ============================================================= --> </div>
        <!-- /.logo-holder -->
        
        <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder"> 
          <!-- /.contact-row --> 
          <!-- ============================================================= SEARCH AREA ============================================================= -->
          <div class="search-area hidden-xs">
            <form method="POST" action="{{url('search')}}">
              @csrf
              <div class="control-group">
                <ul class="categories-filter animate-dropdown">
                  <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories <b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu">
                      <li class="menu-header">Computer</li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="{{url('category/electronics')}}">- Electronics</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="{{url('category/watches')}}">- Watches</a></li>
                    </ul>
                  </li>
                </ul>
                <input class="search-field" name="value" placeholder="Search here...">
                <button class="search-button" type="submit"></button> </div>
            </form>
          </div>
          <!-- /.search-area --> 
          <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
        <!-- /.top-search-holder -->
        
        <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row hidden-xs"> 
          <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
          
          <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
            <div class="items-cart-inner ">
              <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
              <div class="basket-item-count"><span class="count">
                @guest
                0
                @else
                  {{count($products)}}
                @endguest
              </span></div>
              <div class="total-price-basket"> 
                @guest
                @else
                  @if(session()->has('coupon'))
                  <?php
                    $grand_total = $total - session()->get('coupon')['discount'];
                  ?>
                  @else
                    <?php
                      $grand_total = $total;
                    ?>
                    
                  @endif
                @endguest
                </span> </span> </div>
            </div>
            </a>
            <ul class="dropdown-menu">
              @guest
              <li>
                <!-- /.cart-item -->
                <div class="clearfix"></div>
                <hr>
                <div class="clearfix cart-total">
                  <div class="pull-left"> <span class="text">Sub Total :</span><span class='price'>
                    R 0.00  
                  </span> </div>
                  <div class="clearfix"></div>
                  <a href="{{url('shopping-cart')}}" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> </div>
                <!-- /.cart-total--> 
                
              </li>
              @else
              <li>
                @foreach($products as $product)
                <div class="cart-item product-summary">
                  <div class="row">
                    <div class="col-xs-4">
                      <div class="image"> <a href="{{url('detail')}}"><img src="{{asset('uploads/shop/products/'.$product->image)}}" alt=""></a> </div>
                    </div>
                    <div class="col-xs-7">
                      <h3 class="name"><a href="#">{{$product->title}}</a></h3>
                      <div class="price">
                        R{{$product->new_price}}.00
                        
                      </div>
                    </div>
                    <div class="col-xs-1 action"> <a href="{{url('cart/delete/'.$product->id)}}"><i class="fa fa-trash"></i></a> </div>
                  </div>
                </div>
                @endforeach
                <!-- /.cart-item -->
                <div class="clearfix"></div>
                <hr>
                <div class="clearfix cart-total">
                  <div class="pull-right"> <span class="text">Total :</span><span class='price'>
                    R{{$total}}.00  
                  </span> </div>
                  <p style="text-align: center;"><a href="{{url('/')}}">More</a></p>
                  <div class="clearfix"></div>
                  <a href="{{url('shopping-cart')}}" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> </div>
                <!-- /.cart-total--> 
                
              </li>
              @endguest
            </ul>
            <!-- /.dropdown-menu--> 
          </div>
          <!-- /.dropdown-cart --> 
          
          <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
        <!-- /.top-cart-row --> 
      </div>
      <!-- /.row --> 
      
    </div>
    <!-- /.container --> 
    
  </div>
  <!-- /.main-header --> 
  
  <!-- ============================================== NAVBAR ============================================== -->
  <div class="header-nav animate-dropdown">
    <div class="container">
      <div class="yamm navbar navbar-default" role="navigation">
        <div class="navbar-header">
       <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
       <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

       <div class="logo hidden-lg hidden-md hidden-sm"> 
         <a href="{{url('/')}}"> 
          <img src="{{asset('user\assets\images\logowhite.png')}}" style="margin-left:25%; width: 60px; height: 50px;" alt="logo"> 
        </a> 
        <span>
          <i style="margin-left: 28%; color: white; font-size: 15px;" class="glyphicon glyphicon-shopping-cart"></i>
          &nbsp;
          <sup style="color: white;">
            @guest
              0
            @else
              {{count($products)}}
            @endguest
          </sup>
        </span>
      </div> 
        
      
      </div>
        <div class="nav-bg-class">
          <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
            <div class="nav-outer">
              <ul class="nav navbar-nav">
                <li class="active dropdown yamm-fw"> <a href="{{url('/')}}">Home</a> </li>
                {{-- start not for mobile --}}
                <li class="dropdown hidden-xs"> <a href="{{url('category/electronics')}}">Electronics <span class="menu-label hot-menu hidden-xs">hot</span> </a></li>
                <li class="dropdown hidden-xs"> <a href="{{url('category/watches')}}">Watches</a> </li>
                {{-- end not for mobile --}}

                {{-- start only for mobile --}}
                  <li class="dropdown hidden-lg hidden-md hidden-sm"><a href="{{url('seller')}}"><i class="icon fa fa-user"></i>Seller</a></li>
                  <li class="dropdown hidden-lg hidden-md hidden-sm"><a href="{{url('track-orders')}}"><i class="icon fa fa-check"></i>Track Order(s)</a></li>
                  <li class="dropdown hidden-lg hidden-md hidden-sm"><a href="{{url('my-wish-list')}}"><i class="icon fa fa-heart"></i>Wishlist</a></li>
                  <li class="dropdown hidden-lg hidden-md hidden-sm"><a href="{{url('shopping-cart')}}"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
                  @guest
                  <li class="dropdown hidden-lg hidden-md hidden-sm"><a href="{{url('login')}}"><i class="icon fa fa-lock"></i>Login | Register</a></li>
                  @else
                  <li class="dropdown hidden-lg hidden-md hidden-sm">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{auth()->user()->name}} | logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                  </li>
                  @endguest
                {{-- end only for mobile --}}
              </ul>
              <!-- /.navbar-nav -->
              <div class="clearfix"></div>
            </div>
            <!-- /.nav-outer --> 
          </div>
          <!-- /.navbar-collapse --> 
          
        </div>
        <!-- /.nav-bg-class --> 
      </div>
      <!-- /.navbar-default -->



    </div>
    <!-- /.container-class --> 
    
  </div>
  <!-- /.header-nav --> 
  <!-- ============================================== NAVBAR : END ============================================== --> 
  
</header>
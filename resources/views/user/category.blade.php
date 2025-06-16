<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<title>Trolley Way</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{asset('user\assets\css\bootstrap.min.css')}}">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{asset('user\assets\css\main.css')}}">
<link rel="stylesheet" href="{{asset('user\assets\css\blue.css')}}">
<link rel="stylesheet" href="{{asset('user\assets\css\owl.carousel.css')}}">
<link rel="stylesheet" href="{{asset('user\assets\css\owl.transitions.css')}}">
<link rel="stylesheet" href="{{asset('user\assets\css\animate.min.css')}}">
<link rel="stylesheet" href="{{asset('user\assets\css\rateit.css')}}">
<link rel="stylesheet" href="{{asset('user\assets\css\bootstrap-select.min.css')}}">

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{asset('user\assets\css\font-awesome.css')}}">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
<!-- ============================================== HEADER ============================================== -->
<x-header/>

<style>
  .image-height{
    height: 250px;
  }
  .title-height{
    height: 20px;
  }
  .description-height{
    height: 20px;
  }
</style>    

<div class="body-content outer-top-xs">
  <div class='container'>
    <div class='row'>
      <div class='col-md-3 sidebar'> 
        <x-category/>
        <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small hidden-xs">
					<h3 class="section-title">Newsletters</h3>
					<div class="sidebar-widget-body outer-top-xs">
					  <p>Sign Up for Our Newsletter!</p>
					  <form method="POST" action="{{url('subscribe')}}">
						@csrf
						<div class="form-group">
						  <label class="sr-only" for="exampleInputEmail1">Email address</label>
						  <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
						</div>
						<button type="submit" class="btn btn-primary">Subscribe</button>
					  </form>
					</div>
					<!-- /.sidebar-widget-body --> 
				  </div>
          <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small hidden-xs"> 
            <h3 class="section-title">Download Our App</h3>
            <a href="#">
              <img style="width: 100px;" src="{{asset('user/assets/images/Download_on_the_App_Store_Badge.svg')}}" alt="Download_on_the_App_Store_Badge">
            </a>
            <a href="https://play.google.com/store/apps/details?id=com.trolleyway.multivendor_shop">
              <img style="width: 100px;" src="{{asset('user/assets/images/Google_Play_Store_badge_EN.svg')}}" alt="Google_Play_Store_badge_EN">
            </a>
            </div>
        <div class="sidebar-module-container">
          <div class="sidebar-filter"> 
          </div>
          <!-- /.sidebar-filter --> 
        </div>
        <!-- /.sidebar-module-container --> 
      </div>
      <!-- /.sidebar -->
      <div class='col-md-9'> 
     
        <div class="clearfix filters-container m-t-10">
          <div class="row">
            <div class="col col-sm-6 col-md-2">
              <div class="filter-tabs">
                <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                  <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>
                  <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
                </ul>
              </div>
              <!-- /.filter-tabs --> 
            </div>
            <!-- /.col --> 
          </div>
          <!-- /.row --> 
        </div>
        <div class="search-result-container ">
          <div id="myTabContent" class="tab-content category-list">
            <div class="tab-pane active " id="grid-container">
              <div class="category-product">
                <div class="row">
                <?php
                  $items = $product;
                ?>
                  @foreach($product as $product)
                  <div class="col-sm-6 col-md-4 wow fadeInUp">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image image-height"> 
                            <a href="{{url('detail/'.$product->id)}}">
                              <?php $count = 0; ?>
                              @foreach(json_decode($product->image, true) as $image)
                                <?php if($count == 1) break; ?>
                                  <img style="width: 100%; height: auto;" alt="alt" src="{{Storage::cloud()->url($image)}}">
                                <?php $count++; ?>
                              @endforeach
                            </a> 
                          </div>
                          <!-- /.image -->
                          
                          <div class="tag new"><span>new</span></div>
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name title-height"><a href="{{url('detail/'.$product->id)}}">{{$product->title}}</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> R{{$product->new_price}}.00 </span> <span class="price-before-discount">R{{$product->old_price}}.00</span> </div>
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <form method="POST" action="{{url('cart/'.$product->id)}}">
                                  @csrf
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="submit"> <i class="fa fa-shopping-cart"></i> </button>
                              </form>
                                <button class="btn btn-primary cart-btn" type="submit">Add to cart</button>
                              </li>
                              
                            </ul>
                          </div>
                          <!-- /.action --> 
                        </div>
                        <!-- /.cart --> 
                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
                  <!-- /.item -->
                  @endforeach
                </div>
                <!-- /.row --> 
              </div>
              <!-- /.category-product --> 
              
            </div>
            <!-- /.tab-pane -->
            
            <div class="tab-pane " id="list-container">
              <div class="category-product">
                @foreach($items as $list)
                <div class="category-product-inner wow fadeInUp">
                  <div class="products">
                    <div class="product-list product">
                      <div class="row product-list-row">
                        <div class="col col-sm-4 col-lg-4">
                          <div class="product-image">
                            <div class="image image-height"> 
                              <?php $count1 = 0; ?>
                              @foreach(json_decode($list->image, true) as $image)
                                <?php if($count1 == 1) break; ?>
                                  <img style="width: 200px; height: auto;" alt="alt" src="{{Storage::cloud()->url($image)}}">
                                <?php $count1++; ?>
                              @endforeach
                            </div>
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col col-sm-8 col-lg-8">
                          <div class="product-info">
                            <h3 class="name title-height"><a href="{{url('detail/'.$list->id)}}">{{$list->title}}</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> R{{$list->new_price}}.00 </span> <span class="price-before-discount">R{{$list->old_price}}.00</span> </div>
                            <!-- /.product-price -->
                            <div class="description m-t-10">{{$list->description}}</div>
                            <div class="cart clearfix animate-effect">
                              <div class="action">
                                <ul class="list-unstyled">
                                  <li class="add-cart-button btn-group">
                                      <form method="POST" action="{{url('cart/'.$list->id)}}">
                                      @csrf
                                      <button class="btn btn-primary cart-btn" type="submit"> <i class="fa fa-shopping-cart"></i></button>
                                    </form>
                                  </li>
                                </ul>
                              </div>
                              <!-- /.action --> 
                            </div>
                            <!-- /.cart --> 
                            
                          </div>
                          <!-- /.product-info --> 
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-list-row -->
                      <div class="tag new"><span>new</span></div>
                    </div>
                    <!-- /.product-list --> 
                  </div>
                  <!-- /.products --> 
                </div>
                <!-- /.category-product-inner -->
                @endforeach
              </div>
              <!-- /.category-product --> 
            </div>
            <!-- /.tab-pane #list-container --> 
          </div>
          <!-- /.tab-content -->
          <div class="clearfix filters-container">
            <div class="text-right">
              <div class="pagination-container">
                <ul class="list-inline list-unstyled">
                  <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                  <li><a href="#">1</a></li>
                  <li class="active"><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>
                <!-- /.list-inline --> 
              </div>
              <!-- /.pagination-container --> </div>
            <!-- /.text-right --> 
            
          </div>
          <!-- /.filters-container --> 
          
        </div>
        <!-- /.search-result-container --> 
        
      </div>
      <!-- /.col --> 
    </div>
    <!-- /.row --> 
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> 
  </div>
  <!-- /.container --> 
  
</div>
<!-- /.body-content --> 
<x-footer/>

<!-- For demo purposes – can be removed on production --> 

<!-- For demo purposes – can be removed on production : End --> 

<!-- JavaScripts placed at the end of the document so the pages load faster --> 
<!-- JavaScripts placed at the end of the document so the pages load faster --> 
<script src="{{asset('user\assets\js\jquery-1.11.1.min.js')}}"></script> 
<script src="{{asset('user\assets\js\bootstrap.min.js')}}"></script> 
<script src="{{asset('user\assets\js\bootstrap-hover-dropdown.min.js')}}"></script> 
<script src="{{asset('user\assets\js\owl.carousel.min.js')}}"></script> 
<script src="{{asset('user\assets\js\echo.min.js')}}"></script> 
<script src="{{asset('user\assets\js\jquery.easing-1.3.min.js')}}"></script> 
<script src="{{asset('user\assets\js\bootstrap-slider.min.js')}}"></script> 
<script src="{{asset('user\assets\js\jquery.rateit.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('user\assets\js\lightbox.min.js')}}"></script> 
<script src="{{asset('user\assets\js\bootstrap-select.min.js')}}"></script> 
<script src="{{asset('user\assets\js\wow.min.js')}}"></script> 
<script src="{{asset('user\assets\js\scripts.js')}}"></script>
</body>
</html>
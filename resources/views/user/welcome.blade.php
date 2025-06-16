@extends('user.layouts.app')

    @section('content')
      <!-- ============================================== CONTENT ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder"> 
        <!-- ========================================== SECTION – HERO ========================================= -->
        <style>
          .image-height{
            height: 200px;
          }
          .title-height{
            height: 20px;
          }
          .description-height{
            height: 20px;
          }
        </style>        
        <!-- ============================================== INFO BOXES ============================================== -->
        <div class="info-boxes wow fadeInUp">
          <div class="info-boxes-inner">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>	
              <div class="center">
                <strong>{{ $message }}</strong>
              </div>
            </div>
            @endif
        
            @if ($message = Session::get('error'))
            <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>	
              <div class="center">
                <strong>{{ $message }}</strong>
              </div>
            </div>
            @endif
            <div class="row">
              
              <div class="hidden-md col-sm-6 col-lg-6">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading">free shipping</h4>
                    </div>
                  </div>
                  <h6 class="text">Shipping on orders over R450</h6>
                </div>
              </div>
              <!-- .col -->
              
              <div class="col-md-6 col-sm-6 col-lg-6">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading">Special Sale</h4>
                    </div>
                  </div>
                  <h6 class="text">Order over R1000 get free 16GB USB </h6>
                </div>
              </div>
              <!-- .col --> 
            </div>
            <!-- /.row --> 
          </div>
          <!-- /.info-boxes-inner --> 
          
        </div>
        <!-- /.info-boxes --> 
        <!-- ============================================== INFO BOXES : END ============================================== --> 
        <!-- ============================================== SCROLL TABS ============================================== -->
        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
          <div class="more-info-tab clearfix ">
            <h3 class="new-product-title pull-left">New Products</h3>
            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
              <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>
              <li><a data-transition-type="backSlide" href="#smartphone" data-toggle="tab">Watches</a></li>
              <li><a data-transition-type="backSlide" href="#laptop" data-toggle="tab">Electronics</a></li>
            </ul>
            <!-- /.nav-tabs --> 
          </div>
          <div class="tab-content outer-top-xs">
            <div class="tab-pane in active" id="all">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                  
                  @foreach($product as $new)
                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image image-height"> 
                            <a href="{{url('detail/'.$new->id)}}">
                            <?php $count = 0; ?>
                            @foreach((array)json_decode($new->image, true) as $image)
                              <?php if($count == 1) break; ?>
                              <img style="width: 100%; height: auto;" alt="alt" src="{{Storage::cloud()->url($image)}}">
                              <?php $count++; ?>
                            @endforeach
                          </a> </div>
                          <!-- /.image -->
                          
                          <div class="tag new"><span>new</span></div>
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name title-height">
                            <a href="{{url('detail/'.$new->id)}}">{{$new->title}}</a>
                          </h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price">
                             <span class="price"> R{{$new->new_price}}.00 </span>
                            <span class="price-before-discount">R{{$new->old_price}}.00</span> </div>
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <form method="POST" action="{{url('cart/'.$new->id)}}">
                                  @csrf
                                  <input type="hidden" name="quantity" value="1">
                                  <button data-toggle="tooltip" class="btn btn-primary icon" type="submit" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                                  <button class="btn btn-primary cart-btn" type="submit">Add to cart</button>
                                </form>
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
                <!-- /.home-owl-carousel --> 
              </div>
              <!-- /.product-slider --> 
            </div>
            <!-- /.tab-pane -->
            
            <div class="tab-pane" id="smartphone">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                  @foreach($items as $item)
                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image image-height"> 
                          <a href="{{url('detail/'.$item->id)}}">
                            <?php $count1 = 0; ?>
                            @foreach(json_decode($item->image, true) as $image)
                              <?php if($count1 == 1) break; ?>
                              <img style="width: 100%; height: auto;" alt="alt" src="{{Storage::cloud()->url($image)}}">
                              <?php $count1++; ?>
                            @endforeach
                          </a> 
                        </div>
                          <!-- /.image -->
                          
                          <div class="tag sale"><span>sale</span></div>
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name title-height"><a href="{{url('detail/'.$item->id)}}">{{$item->title}}</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> R{{$item->new_price}}.00 </span> <span class="price-before-discount">R{{$item->old_price}}.00</span> </div>
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <form method="POST" action="{{url('cart/'.$item->id)}}">
                                  @csrf
                                  <input type="hidden" name="quantity" value="1">
                                  <button class="btn btn-primary icon" data-toggle="dropdown" type="submit"> <i class="fa fa-shopping-cart"></i> </button>
                                  <button class="btn btn-primary cart-btn" type="submit">Add to cart</button>
                                </form>
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
                <!-- /.home-owl-carousel --> 
              </div>
              <!-- /.product-slider --> 
            </div>
            <!-- /.tab-pane -->
            
            <div class="tab-pane" id="laptop">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                  @foreach($electronics as $electronic)
                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image image-height"> 
                            <a href="{{url('detail/'.$electronic->id)}}">
                              <?php $count2 = 0; ?>
                              @foreach(json_decode($electronic->image, true) as $image)
                                <?php if($count2 == 1) break; ?>
                                <img style="width: 100%; height: auto;" alt="alt" src="{{Storage::cloud()->url($image)}}">
                                <?php $count2++; ?>
                              @endforeach
                            </a> 
                          </div>
                          <!-- /.image -->
                          
                          <div class="tag new"><span>new</span></div>
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name title-height"><a href="{{url('detail/'.$electronic->id)}}">{{$electronic->title}}</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> R{{$electronic->new_price}}.00 </span> <span class="price-before-discount">R{{$electronic->old_price}}.00</span> </div>
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <form method="POST" action="{{url('cart/'.$electronic->id)}}">
                                  @csrf
                                  <input type="hidden" name="quantity" value="1">
                                  <button class="btn btn-primary icon" data-toggle="dropdown" type="submit"> <i class="fa fa-shopping-cart"></i> </button>
                                  <button class="btn btn-primary cart-btn" type="submit">Add to cart</button>
                                </form>
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
                <!-- /.home-owl-carousel --> 
              </div>
              <!-- /.product-slider --> 
            </div>
            <!-- /.tab-pane -->
            
            <div class="tab-pane" id="apple">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                  @foreach($shoes as $shoe)
                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image image-height"> 
                          <a href="{{url('detail/'.$shoe->id)}}">
                            <?php $count3 = 0; ?>
                              @foreach(json_decode($shoe->image, true) as $image)
                                <?php if($count3 == 1) break; ?>
                                <img style="width: 100%; height: auto;" alt="alt" src="{{Storage::cloud()->url($image)}}">
                                <?php $count3++; ?>
                              @endforeach
                          </a> 
                        </div>
                          <!-- /.image -->
                          
                          <div class="tag sale"><span>sale</span></div>
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name title-height"><a href="{{url('detail/'.$shoe->id)}}">{{$shoe->title}}</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> R{{$shoe->new_price}}.00 </span> <span class="price-before-discount">R{{$shoe->old_price}}.00</span> </div>
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <form method="POST" action="{{url('cart/'.$shoe->id)}}">
                                  @csrf
                                  <input type="hidden" name="quantity" value="1">
                                  <button class="btn btn-primary icon" data-toggle="dropdown" type="submit"> <i class="fa fa-shopping-cart"></i> </button>
                                  <button class="btn btn-primary cart-btn" type="submit">Add to cart</button>
                                </form>
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
                <!-- /.home-owl-carousel --> 
              </div>
              <!-- /.product-slider --> 
            </div>
            <!-- /.tab-pane --> 
            
          </div>
          <!-- /.tab-content --> 
        </div>
        <!-- /.scroll-tabs --> 
        <!-- ============================================== SCROLL TABS : END ============================================== --> 
      
        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
        <section class="section wow fadeInUp new-arriavls">
          <h3 class="section-title">New Arrivals</h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
            @foreach($arrival as $arrival)
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image image-height"> 
                      <a href="{{url('detail/'.$arrival->id)}}">
                        <?php $count7 = 0; ?>
                        @foreach(json_decode($arrival->image, true) as $image)
                          <?php if($count7 == 1) break; ?>
                            <img style="width: 100%; height: auto;" alt="alt" src="{{Storage::cloud()->url($image)}}"">
                          <?php $count7++; ?>
                        @endforeach
                      </a> 
                    </div>
                    <!-- /.image -->
                    
                    <div class="tag new"><span>new</span></div>
                  </div>
                  <!-- /.product-image -->
                  
                  <div class="product-info text-left">
                    <h3 class="name title-height"><a href="{{url('detail/'.$arrival->id)}}">{{$arrival->title}}</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>
                    <div class="product-price"> <span class="price"> R{{$arrival->new_price}}.00 </span> <span class="price-before-discount">R{{$arrival->old_price}}.00</span> </div>
                    <!-- /.product-price --> 
                    
                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <form method="POST" action="{{url('cart/'.$arrival->id)}}">
                            @csrf
                            <input type="hidden" name="quantity" value="1">
                            <button class="btn btn-primary icon" data-toggle="dropdown" type="submit"> <i class="fa fa-shopping-cart"></i> </button>
                            <button class="btn btn-primary cart-btn" type="submit">Add to cart</button>
                          </form>
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
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== --> 
        
      </div>
      <!-- /.homebanner-holder -->
      
      
@endsection
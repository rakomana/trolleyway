      <!-- ============================================== SIDEBAR ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-3 sidebar"> 
        
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
        <!-- /.sidebar-widget --> 
        <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small hidden-xs"> 
          <h3 class="section-title">Download Our App</h3>
          <a href="#">
            <img style="width: 100px;" src="{{asset('user/assets/images/Download_on_the_App_Store_Badge.svg')}}" alt="Download_on_the_App_Store_Badge">
          </a>
          <a href="https://play.google.com/store/apps/details?id=com.trolleyway.multivendor_shop">
            <img style="width: 100px;" src="{{asset('user/assets/images/Google_Play_Store_badge_EN.svg')}}" alt="Google_Play_Store_badge_EN">
          </a>
        </div>

        <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small hidden-xs"> 
          <h3 class="section-title">Follow Us</h3>
          <a href="https://www.facebook.com/Trolleyway-107523054365644">
            <i class="fa fa-facebook"></i>
          </a>
          &nbsp;&nbsp;
          <a href="#">
            <i class="fa fa-twitter"></i>
          </a>
          &nbsp;&nbsp;
          <a href="#">
            <i class="fa fa-instagram"></i>
          </a>
        </div>
      </div>
      <!-- /.sidemenu-holder --> 
      <!-- ============================================== SIDEBAR : END ============================================== --> 
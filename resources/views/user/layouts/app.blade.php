<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="author" content="Rakomana Prince">
{!! SEOMeta::generate() !!}
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="shortcut icon" href="{{asset('logo_lkZ_icon.ico')}}" type="image/x-icon">

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{asset('user\assets\css\bootstrap.min.css')}}">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
<script src="{{ asset('js/share.js') }}"></script>


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

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Z8SPZKRJF3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-Z8SPZKRJF3');
</script>
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
<x-header/>

<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row"> 

      <x-sidebar/>

      <div id="app">
          @yield('content')
      </div>
      <!-- /.homebanner-holder --> 
      <!-- ============================================== CONTENT : END ============================================== --> 
    </div>
    <!-- /.row --> 
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    <div id="brands-carousel" class="logo-slider wow fadeInUp">
      <div class="logo-slider-inner">
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
          <div class="item m-t-15"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand1.png" src="{{asset('user\assets\images\blank.gif')}}" alt=""> </a> </div>
          <!--/.item-->
          
          <div class="item m-t-10"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand2.png" src="{{asset('user\assets\images\blank.gif')}}" alt=""> </a> </div>
          <!--/.item-->
          
          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand3.png" src="{{asset('user\assets\images\blank.gif')}}" alt=""> </a> </div>
          <!--/.item-->
          
          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand4.png" src="{{asset('user\assets\images\blank.gif')}}" alt=""> </a> </div>
          <!--/.item-->
          
          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand5.png" src="{{asset('user\assets\images\blank.gif')}}" alt=""> </a> </div>
          <!--/.item-->
          
          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand6.png" src="{{asset('user\assets\images\blank.gif')}}" alt=""> </a> </div>
          <!--/.item-->
          
          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand2.png" src="{{asset('user\assets\images\blank.gif')}}" alt=""> </a> </div>
          <!--/.item-->
          
          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand4.png" src="{{asset('user\assets\images\blank.gif')}}" alt=""> </a> </div>
          <!--/.item-->
          
          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand1.png" src="{{asset('user\assets\images\blank.gif')}}" alt=""> </a> </div>
          <!--/.item-->
          
          <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand5.png" src="{{asset('user\assets\images\blank.gif')}}" alt=""> </a> </div>
          <!--/.item--> 
        </div>
        <!-- /.owl-carousel #logo-slider --> 
      </div>
      <!-- /.logo-slider-inner --> 
      
    </div>
    <!-- /.logo-slider --> 
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> 
  </div>
  <!-- /.container --> 
</div>
<!-- /#top-banner-and-menu --> 

<x-footer/>

<!-- For demo purposes – can be removed on production --> 

<!-- For demo purposes – can be removed on production : End --> 

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
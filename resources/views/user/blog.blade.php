@extends('user.layouts.default')

@section('content')

<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{url('/')}}">Home</a></li>
				<li class='active'>Blog</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<h2 class="text-center">Coming Soon...</h2>

{{--<div class="body-content">--}}
{{--	<div class="container">--}}
{{--		<div class="row">--}}
{{--			<div class="blog-page">--}}
{{--				<div class="col-md-9">--}}
{{--				@foreach($blogs as $blog)--}}
{{--				<?php--}}
{{--					$comments = DB::table('blog_comments')->where('blog_id', $blog->id)->get();--}}
{{--				?>--}}
{{--				<div class="blog-post outer-top-bd  wow fadeInUp">--}}
{{--					<a href="{{url('blog-details/'.$blog->id)}}">--}}
{{--						<img class="img-responsive" src="{{asset('uploads/blog/'.$blog->image)}}" alt=""></a>--}}
{{--					<h1><a href="{{url('blog-details/'.$blog->id)}}">{{$blog->title}}</a></h1>--}}
{{--					<span class="author">{{$blog->author}}</span>--}}
{{--					<span class="review">{{count($comments)}} Comments</span>--}}
{{--					<span class="date-time">{{$blog->created_at}}</span>--}}
{{--					<p>{{$blog->description_1}}</p>--}}
{{--					<a href="{{url('blog-details/'.$blog->id)}}" class="btn btn-upper btn-primary read-more">read more</a>--}}
{{--				</div>--}}
{{--				@endforeach--}}
{{--<div class="clearfix blog-pagination filters-container  wow fadeInUp" style="padding:0px; background:none; box-shadow:none; margin-top:15px; border:none">--}}
{{--						--}}
{{--	<div class="text-right">--}}
{{--         <div class="pagination-container">--}}
{{--	<ul class="list-inline list-unstyled">--}}
{{--		<li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>--}}
{{--		<li><a href="#">1</a></li>	--}}
{{--		<li class="active"><a href="#">2</a></li>	--}}
{{--		<li><a href="#">3</a></li>	--}}
{{--		<li><a href="#">4</a></li>	--}}
{{--		<li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>--}}
{{--	</ul><!-- /.list-inline -->--}}
{{--</div><!-- /.pagination-container -->    </div><!-- /.text-right -->--}}

{{--</div><!-- /.filters-container -->				</div>--}}
{{--				<div class="col-md-3 sidebar">--}}
{{--                --}}
{{--                --}}
{{--                --}}
{{--					<div class="sidebar-module-container">--}}
{{--						<div class="search-area outer-bottom-small">--}}
{{--    <form>--}}
{{--        <div class="control-group">--}}
{{--            <input placeholder="Type to search" class="search-field">--}}
{{--            <a href="#" class="search-button"></a>   --}}
{{--        </div>--}}
{{--    </form>--}}
{{--</div>		--}}

{{--<div class="home-banner outer-top-n outer-bottom-xs">--}}
{{--<a href="#">Download TrolleyWay App</a>--}}
{{--</div>--}}
{{--</div></div>--}}
{{--			</div>--}}
{{--		</div>--}}
{{--		<!-- ============================================== BRANDS CAROUSEL ============================================== -->--}}
{{--<div id="brands-carousel" class="logo-slider wow fadeInUp">--}}

{{--		<div class="logo-slider-inner">	--}}
{{--			<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">--}}
{{--				<div class="item m-t-15">--}}
{{--					<a href="#" class="image">--}}
{{--						<img data-echo="{{asset('user/assets/images/brands/brand1.png')}}" src="{{asset('user\assets\images\blank.gif')}}" alt="">--}}
{{--					</a>	--}}
{{--				</div><!--/.item-->--}}

{{--				<div class="item m-t-10">--}}
{{--					<a href="#" class="image">--}}
{{--						<img data-echo="{{asset('user/assets/images/brands/brand2.png')}}" src="{{asset('user\assets\images\blank.gif')}}" alt="">--}}
{{--					</a>	--}}
{{--				</div><!--/.item-->--}}

{{--				<div class="item">--}}
{{--					<a href="#" class="image">--}}
{{--						<img data-echo="{{asset('user/assets/images/brands/brand3.png')}}" src="{{asset('user\assets\images\blank.gif')}}" alt="">--}}
{{--					</a>	--}}
{{--				</div><!--/.item-->--}}

{{--				<div class="item">--}}
{{--					<a href="#" class="image">--}}
{{--						<img data-echo="{{asset('user/assets/images/brands/brand4.png')}}" src="{{asset('user\assets\images\blank.gif')}}" alt="">--}}
{{--					</a>	--}}
{{--				</div><!--/.item-->--}}

{{--				<div class="item">--}}
{{--					<a href="#" class="image">--}}
{{--						<img data-echo="{{asset('user/assets/images/brands/brand5.png')}}" src="{{asset('user\assets\images\blank.gif')}}" alt="">--}}
{{--					</a>	--}}
{{--				</div><!--/.item-->--}}

{{--				<div class="item">--}}
{{--					<a href="#" class="image">--}}
{{--						<img data-echo="{{asset('user/assets/images/brands/brand6.png')}}" src="{{asset('user\assets\images\blank.gif')}}" alt="">--}}
{{--					</a>	--}}
{{--				</div><!--/.item-->--}}

{{--				<div class="item">--}}
{{--					<a href="#" class="image">--}}
{{--						<img data-echo="{{asset('user/assets/images/brands/brand2.png')}}" src="{{asset('user\assets\images\blank.gif')}}" alt="">--}}
{{--					</a>	--}}
{{--				</div><!--/.item-->--}}

{{--				<div class="item">--}}
{{--					<a href="#" class="image">--}}
{{--						<img data-echo="{{asset('user/assets/images/brands/brand4.png')}}" src="{{asset('user\assets\images\blank.gif')}}" alt="">--}}
{{--					</a>	--}}
{{--				</div><!--/.item-->--}}

{{--				<div class="item">--}}
{{--					<a href="#" class="image">--}}
{{--						<img data-echo="{{asset('user/assets/images/brands/brand1.png')}}" src="{{('user\assets\images\blank.gif')}}" alt="">--}}
{{--					</a>	--}}
{{--				</div><!--/.item-->--}}

{{--				<div class="item">--}}
{{--					<a href="#" class="image">--}}
{{--						<img data-echo="{{asset('user/assets/images/brands/brand5.png')}}" src="{{asset('user\assets\images\blank.gif')}}" alt="">--}}
{{--					</a>	--}}
{{--				</div><!--/.item-->--}}
{{--		    </div><!-- /.owl-carousel #logo-slider -->--}}
{{--		</div><!-- /.logo-slider-inner -->--}}
{{--	--}}
{{--</div><!-- /.logo-slider -->--}}
{{--<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div>--}}
{{--</div>--}}

@endsection

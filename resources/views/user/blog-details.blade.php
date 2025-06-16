@extends('user.layouts.default')

@section('content')
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Blog Details</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="row">
			<div class="blog-page">
				<div class="col-md-9">
					<div class="blog-post wow fadeInUp">
	<img class="img-responsive" src="{{asset('uploads/blog/'.$blog->image)}}" alt="">
	<h1>{{$blog->title}}</h1>
	<span class="author">{{$blog->author}}</span>
	<span class="review">7 Comments</span>
	<span class="date-time">{{$blog->created_at}}</span>
	<p>{{$blog->description_1}}</p>
	<p>{{$blog->description_2}}</p>
	<div class="social-media">
		<span>share post:</span>
		<a href="#"><i class="fa fa-facebook"></i></a>
		<a href="#"><i class="fa fa-twitter"></i></a>
		<a href="#"><i class="fa fa-linkedin"></i></a>
		<a href=""><i class="fa fa-whatsapp"></i></a>
	</div>
</div>


<div class="blog-review wow fadeInUp">
	<div class="row">
		<div class="col-md-12">
			<h3 class="title-review-comments">{{count($comments)}} comments</h3>
		</div>
		@foreach($comments as $comment)
		<div class="col-md-2 col-sm-2">
			<img src="{{asset('user\assets\images\testimonials\member1.png')}}" alt="Responsive image" class="img-rounded img-responsive">
		</div>
		<div class="col-md-10 col-sm-10 blog-comments outer-bottom-xs">
			<div class="blog-comments inner-bottom-xs">
				<h4>
					<?php
						$user = DB::table('users')->where('id', $comment->user_id)->first();
					?>
					{{$user->name}}
				</h4>
				<span class="review-action pull-right">
					{{$comment->created_at}} &sol;
					<a href=""> Reply</a>
				</span>
				<p>{{$comment->comment}}</p>
			</div>
		</div>
		@endforeach
	</div>
</div>


<div class="blog-write-comment outer-bottom-xs outer-top-xs">
	<div class="row">
		<div class="col-md-12">
			<h4>Leave A Comment</h4>
		</div>
		<form action="{{url('blog/comment/'.$blog->id)}}" method="POST">
		@csrf
		<div class="col-md-12">
				<div class="form-group">
			    <label class="info-title" for="exampleInputComments">Your Comments <span>*</span></label>
			    <textarea name="comment" class="form-control unicase-form-control" id="exampleInputComments"></textarea>
			  </div>
		</div>
		<div class="col-md-12 outer-bottom-small m-t-20">
			<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Submit Comment</button>
		</div>
	</form>
	</div>
</div>
				</div>
				<div class="col-md-3 sidebar">
                
                
                
					<div class="sidebar-module-container">
						<div class="search-area outer-bottom-small">
    <form>
        <div class="control-group">
            <input placeholder="Type to search" class="search-field">
            <a href="#" class="search-button"></a>   
        </div>
    </form>
</div>		

<div class="home-banner outer-top-n outer-bottom-xs">
	<a href="#">Download TrolleyWay App</a>
</div>

	</div>
</div></div>
			</div>
		</div>
	</div>
</div>
@endsection
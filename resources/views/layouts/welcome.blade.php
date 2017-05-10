@extends('main')

@section('title', 'Home')

@section('content')

<div class="container-fluid bg-img-1 img-resposive">
	<div class="row">
		<div class="home-header col-md-10 col-md-offset-1 text-center">
			<h1 style="font-size: 70px;">Health is Wealth</h1>
			<p style="font-size: 25px; letter-spacing: .3em;">Your health our pride</p>
		</div>
	</div>
</div>

<div class="container container-spacer" style="margin-top: 140px;">
	<div class="row">
		<h2 style="margin-left: 21px;">Popular Posts</h2>
	</div>
	<div class="row">
		<div class="col-md-4 text-center popular-posts">
			<img class="popular-post-img img-responsive" src="" alt="">
			<h3><b>Stay ahead of the game. Subscribe!</b></h3>
			<p class="comment-time">7 commente | 5632 views</p>
		</div>

		<div class="col-md-4 text-center popular-posts">
			<img class="popular-post-img img-responsive" src="" alt="">
			<h3><b>Stay ahead of the game. Subscribe!</b></h3>
			<p class="comment-time">7 commente | 5632 views</p>
		</div>

		<div class="col-md-4 text-center popular-posts">
			<img class="popular-post-img img-responsive" src="" alt="">
			<h3><b>Stay ahead of the game. Subscribe!</b></h3>
			<p class="comment-time">7 commente | 5632 views</p>
		</div>
	</div>
</div>

<div class="container-fluid container-spacer find-out">
	<div class="col-md-6 col-md-offset-3 text-center">	
		<h4><b>You will love Beta Healthcare</b></h4>
		<p class="sm-bottom-spacer">Vlog is a carefully crafted WordPress theme with a focus on your video content. It will suit the needs of any personal video blog, all the way to complex magazine websites. Whether you need a website for video blogging, video tutorials and lessons or any sort of viral video sharing, Vlog is the perfect choice. YouTube, Vimeo, Dailymotion and other common video content never looked better!</p>
		<a href="#" class="btn btn-purple-purple">FIND OUT MORE</a>
	</div>	
</div>

<div class="container container-spacer">
	<div class="row">		
		<div class="col-md-8 col-md-offset-1">
			<h4><b>LATEST POSTS</b></h4>
			@foreach($posts as $post)
				<div class="spacer-bottom clearfix">
					<a href="{{ route('blog.single', [$post->slug]) }}"><img src="{{ asset('images/uploads/' . $post->image ) }}" alt="" class="popular-post-img img-responsive" style="float: left; margin-right: 20px; margin-bottom: 20px;"></a>

					@if(count($post->category) > 0)
						<p class="text-uppercase category">{{ $post->category->name }}</p>
					@endif
					<h4><b>{{ $post->title }}</b></h4>
					<p class="comment-time" style="font-size: 13px;">{{ date('M j, Y H:i', strtotime($post->created_at ))}}</p>
					
					<p>{{ substr(strip_tags($post->body), 0, 270)}} {{ strlen(strip_tags($post->body)) > 270 ? "..." : "" }}</p>

				</div>
				
			@endforeach
		</div>	

		<div class="col-md-3">
			<div class="row thumbnail cats">	
				<h4><b>CATEGORIES</b></h4>
				@foreach($categories as $category)
					<h5 class="badge cat-info">{{ $category->posts()->count() }}</h5>
					<p class="cat-info">{{ $category->name }}</p><br>
				@endforeach
			</div>

			<div class="row newsletter">
				<h4 style="margin-bottom: 20px;"><b>NEWSLETTER</b></h4>
				<p>Stay ahead of the game. Subscribe to our FREE newsletter now!</p>

				<form action="" method="POST" role="form" style="margin-top: 20px;">
				
					<div class="form-group">
						<input type="email" class="form-control" placeholder="Enter Your Email" required="">
					</div>
				
					
				
					<button type="submit" class="btn btn-purple">SUBSCRIBE</button>
				</form>
				
			</div>
		</div>	
	</div>
</div>

@include('partials._footer')

@stop


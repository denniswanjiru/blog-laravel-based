@extends('main')

@section('title', "$post->title")

@section('content')

<div class="container">
	<div class="row single-blog">
		<div class="col-md-8">
			{{-- Single Post Details --}}
			@if(count($post->category) > 0)
				<p class="category text-uppercase">{{ $post->category->name }}</p>
			@endif

			<h2 class="sm-banner-title">{{ $post->title }}</h2>
			<p class="comment-time">
				{{ date('M j, H:i', strtotime($post->created_at ))}} / 

				@if($post->comments()->count() == 0)
					be the first to comment
				@elseif($post->comments()->count() == 1)
					{{ $post->comments()->count() }} comment
				@else
					{{ $post->comments()->count() }} comments
				@endif
			</p>

			<img src="{{ asset('images/uploads/'.$post->image) }}" alt="" width="800" height="400" class="sm-bottom-spacer img-responsive">

			<p>{!! $post->body !!}</p>
			
			{{-- End of the Single Post Details --}}
			<hr>
			{{-- Comment Form --}}

			<form action="{{ route('comments.store', [$post->id]) }}" method="POST" role="form" class="form-group sm-top-spacer">

				{{ csrf_field() }}

				<legend>Add a Comment</legend>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="name">Name</label>
							<input name="name" type="text" class="form-control" id="" placeholder="Enter your Name" required="required" maxlength="255">
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label for="email">Email</label>
							<input name="email" type="text" class="form-control" id="" placeholder="Enter your Email" required="required" maxlength="255">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="email">Comment</label>
							<textarea name="comment" id="textarea" class="form-control" rows="8" required="required" maxlength="2000"></textarea>
						</div>					
						
						<button type="submit" class="btn btn-purple-purple">ADD COMMENT</button>
					</div>					
				</div>				
			</form>

			{{-- End of Comment Form --}}
			<hr>
			
			@if($post->comments()->count() == 0)
				<legend>Be the first to comment</legend>
			@elseif($post->comments()->count() == 1)
				<legend>{{ $post->comments()->count() }}</small> <small>Comment </legend>
			@else
				<legend>{{ $post->comments()->count() }} Comments </legend>
			@endif

			{{-- Comments Section --}}
			@foreach($post->comments as $comment)
			<div class="segment">
				<div class="author-info">
					<div class="avatar img-responsive img-circle">
						<img src="" alt="">
					</div>
					<div class="author-name">
						<h4 class="text-capitalize">{{ $comment->name }}</h4>
						<div class="comment-time">
							<p>{{ date('F n, Y - g:ia', strtotime($comment->created_at)) }}</p>
						</div>
					</div>	
				</div>

				<div class="comment-content">
					<p>{{ $comment->comment }}</p>
				</div>
			</div>		
			<hr>		
			@endforeach

		</div>
		{{-- End of Comment Section --}}

		{{-- Sidebar --}}
		<div class="col-md-3 col-md-offset-1">
			{{-- Author Info --}}
			<div class="row about-author text-center thumbnail">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<img class="author-avatar img-circle" src="{{ asset('images/uploads/avatars/'. $post->user->avatar) }}">
						<h4><b>{{ $post->user->name }}</b></h4>
					</div>					
				</div>
				<div class="caption">
					<p>{{ $post->user->description }}</p>
					<button class="btn btn-purple-purple">VIEW ALL POSTS</button>
				</div>				
			</div>
			{{-- End of Author info --}}

			{{-- Latest Posts Sidebar --}}
			<div class="row">
				<h3>Latest Posts</h3>
				@foreach($posts as $post)
					<img src="{{ asset('images/uploads/'.$post->image) }}" class="sm-top-spacer img-responsive">
					<h4 class="side-title">{{ $post->title }}</h4>
					<p class="comment-time">{{ date('F n', strtotime($post->created_at)) }}</p>
				@endforeach
			</div>				
			{{-- End of Latest Posts --}}
			<hr>
			{{-- Newsletter --}}
			<div class="row newsletter spacer-bottom">
				<h4 style="margin-bottom: 20px;"><b>NEWSLETTER</b></h4>
				<p>Stay ahead of the game. Subscribe to our FREE newsletter now!</p>

				<form action="" method="POST" role="form" style="margin-top: 20px;">
				
					<div class="form-group">
						<input type="email" class="form-control" placeholder="Enter Your Email" required="">
					</div>

					<button type="submit" class="btn btn-purple">SUBSCRIBE</button>
				</form>
				
			</div>	

			{{-- End of Newsletter --}}
		</div>
	</div>	
</div>

@include('partials._footer')

@stop
<div class="row">
	<div class="row">
		<div class="col-md-12">
			<img src="{{ asset('images/uploads/'.$post->image) }}" alt="" width="1348" height="560">
		</div>
	</div>
	
	<div class="row">	
		<div class="blog-title col-md-10 col-md-offset-1">
			<div class="col-md-6">
				@if(count($post->category) > 0)
					<p class="category text-uppercase sm-banner-title">{{ $post->category->name }}</p>
				@endif
  
				<h2 class="sm-banner-title">{{ $post->title }}</h2>
				<p class="comment-time">{{ date('M j, Y H:i', strtotime($post->created_at ))}}</p>
			</div>

			<div class="col-md-6">
				<div class="row pull-right">
					<p><i class="fa fa-comment-o comment-icon" aria-hidden="true"></i></p>
					@if($post->comments()->count() == 0)
						<p><b>BE THE FIRST TO COMMENT</b></p>
					@elseif($post->comments()->count() == 1)
						<p><b>{{ $post->comments()->count() }} COMMENT</b> </p>
					@else
						<p><b>{{ $post->comments()->count() }} COMMENTS</b> </p>
					@endif
				</div>				
			</div>						
		</div>
	</div>	
</div>
<div class="row">
	<div class="container">	
		<div class="col-md-8">
			<div class="row">
				<p>{!! $post->body !!}</p>
			</div>

			<div class="row">
				<form action="{{ route('comments.store', [$post->id]) }}" method="POST" role="form">

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
								<textarea name="comment" id="textarea" class="form-control" rows="6" required="required" maxlength="2000"></textarea>
							</div>					
							
							<button type="submit" class="btn btn-purple-purple">ADD COMMENT</button>
						</div>					
					</div>				
					<hr>
				</form>
			</div>
			{{-- Comments --}}

			<div class="row">
				<div class="col-md-12">
					@if($post->comments()->count() == 0)
						<legend>Be the first to comment</legend>
					@elseif($post->comments()->count() == 1)
						<legend>{{ $post->comments()->count() }}</small> <small>Comment </legend>
					@else
						<legend>{{ $post->comments()->count() }} Comments </legend>
					@endif

				</div>				
			</div>

			@foreach($post->comments as $comment)
			<div class="segment">
				<div class="author-info">
					<div class="avatar img-responsive">
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
	</div>	
</div>



<div class="row">
		<div class="col-md-12">
			<div class="col-md-6 hidden" id="edit" style="margin-left: 74px;">
				<form action="{{ route('admin.profile') }}" method="POST" role="form" enctype="multipart/form-data" >
					<legend>Update Profile</legend>
				
					<div class="form-group">
						<input name="avatar" type="file">
					</div>
					
					<div class="form-group">
						<label for="about">About Yourself</label>
						<textarea name="about" class="form-control" rows="6" required="required"></textarea>
					</div>					

					<button type="submit" class="btn btn-purple-purple">Update</button>
					{{ csrf_field() }}
				</form>
			</div>			
		</div>
	</div>

	@if($user != Auth::user())
		<div class="alert alert-danger">
			<strong>Error!</strong>
		</div>
	@else

	<div class="row">
		<div class="col-md-4">
			<ul class="list-group">
				<li class="list-group-item"></li>
				<li class="list-group-item"></li>
				<li class="list-group-item"></li>
				<li class="list-group-item"></li>
				<li class="list-group-item"></li>
				<li class="list-group-item"></li>
				<li class="list-group-item"></li>
			</ul>
		</div>
		<div class="col-md-4">
			<ul class="list-group">
				<li class="list-group-item"></li>
				<li class="list-group-item"></li>
				<li class="list-group-item"></li>
				<li class="list-group-item"></li>
				<li class="list-group-item"></li>
				<li class="list-group-item"></li>
				<li class="list-group-item"></li>
			</ul>
		</div>
		<div class="col-md-4">
			<ul class="list-group">
				<li class="list-group-item"></li>
				<li class="list-group-item"></li>
				<li class="list-group-item"></li>
				<li class="list-group-item"></li>
				<li class="list-group-item"></li>
				<li class="list-group-item"></li>
				<li class="list-group-item"></li>
			</ul>
		</div>
	</div>
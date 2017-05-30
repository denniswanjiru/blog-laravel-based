@extends('layouts.admin')

	@section('title', 'View Post')

	@section('content')

		<div class="container-fluid">

	        <div class="row">
	            <div class="col-md-7">

	            	<img src="{{ asset('images/uploads/posts'. $post->image ) }}" class="img-responsive" width="800" height="400">
					<h1 class="capitalize">{{ $post->title }}</h1>

					<p class="lead">{!! $post->body !!}</p>
					<hr>

					<div class="tags">
						@foreach($post->tags as $tag)
							<span class="label label-default" style="font-size: 14px;">{{ $tag->name }}</span>
						@endforeach
					</div>
				</div>



				<div class="col-md-4 col-md-offset-1">
					<div class="well ">
						<dl class="dl-horizontal">
							<label>Post's Link:</label> <a href="{{ route('blog.single', $post->slug) }}">{{  route('blog.single', $post->slug) }}</a>
						</dl>

						@if(count($post->category) > 0)

							<dl class="dl-horizontal">
								<label>Category: </label>
								{{ $post->category->name }}
							</dl>
						@endif

						<dl class="dl-horizontal">
							<label>Created At: </label>
							{{ date('M j, Y H:i', strtotime($post->created_at ))}}
						</dl>

						<dl class="dl-horizontal">
							<label>Last Updated: </label>
							{{ date('M j, Y H:i', strtotime($post->updated_at ))}}
						</dl>
						<hr>
						<div class="row">
							<div class="col-md-5 ">
								<a href="{{ route('posts.edit', [$post->id]) }}" class="btn btn-primary center btn-block"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
							</div>

							<div class="col-md-5 col-md-offset-2">
								<form action="{{ action('PostController@destroy', $post->id) }}" method="POST" role="form">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}

									<button type="submit" class="btn btn-danger center btn-block"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
								</form>
							</div>
						</div>

						<div class="row" style="margin-top: 20px;">
							<div class="col-md-12">
								<a href="{{ route('posts.index') }}" class="btn btn-default btn-block"><i class="fa fa-reply-all" aria-hidden="true"></i> All Posts</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@stop

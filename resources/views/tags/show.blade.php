@extends('admin')

@section('title', 'View Tag')

@section('content')
	<div class="row">
		<div class="col-md-8">
			<h2 class="text-capitalize text-center">{{ $tag->name }} Tag
				@if(count($tag->posts) == 0)
					<small class="text-lowercase">is not yet tied to any post</small>
				@elseif(count($tag->posts) == 1)
					<small>{{ $tag->posts()->count() }} Post</small>
				@else
					<small>{{ $tag->posts()->count() }} Posts</small>
				@endif
		</div>

		<div class="col-md-2">
			<a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary pull-right" style="margin-top: 20px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Tag</a>
		</div>

		<div class="col-md-2">
			<form action="{{ route('tags.destroy', $tag->id) }}" method="POST" role="form">
				{!! csrf_field() !!}
				{{ method_field('DELETE') }}	

				<button type="submit" class="btn btn-danger pull-left" style="margin-top: 20px;"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
			</form>			
		</div>

	</div>

	@if($tag->posts()->count() > 0)

	<hr>

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Tag</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($tag->posts as $post)
						<tr>
							<th>{{ $post->id }}</th>
							<td>{{ $post->title }}</td>
							<td>
								@foreach($post->tags as $tag)
									<span class="label label-default">{{ $tag->name }}</span>
								@endforeach								
							</td>
							<td>
								<a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	@endif
@stop

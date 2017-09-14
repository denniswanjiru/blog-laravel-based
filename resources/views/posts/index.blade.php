@extends('layouts.admin')

@section('title', 'All Posts')

@section('counter')
	@if(count($posts) == 0)
		<small>No Available Posts Yet!</small>
	@elseif(count($posts))
		<span class="badge badger">{{ $posts->count() }}</span>
	@endif
@stop

@section('content')

@if(count($posts) > 0)

<div class="container-fluid" style="margin-top: 10px;">
	<div class="row col-md-12">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Title</th>
					<th>Body</th>
					<th>Created at</th>
			</thead>
			<tbody>
				@foreach($posts as $post)
				<tr>
					<th>{{ $post->id }}</th>
					<td>{{ $post->title }}</td>
					<td>{{ substr(strip_tags($post->body), 0, 50)}} {{ strlen(strip_tags($post->body)) > 50 ? "..." : "" }}</td>
					<td>{{ $post->created_at }}</td>
					<td>
						<a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
						<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
						<a class="pull-right">
							<form action="{{ route('posts.destroy', $post->id) }}" method="POST" role="form">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}

								<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
							</form>
						</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<div class="text-center">
		{!! $posts->links() !!}
	</div>
</div>

@endif

@stop

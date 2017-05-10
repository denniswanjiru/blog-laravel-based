@extends('admin')

@section('title', 'View Category')

@section('content')

	<div class="container">
		<div class="row spacer-bottom">
			<div class="col-md-8 text-center">
				<h2>{{ $category->name }} Category

					@if($category->posts()->count() == 0)

						<small>is not assigned to any post yet!</small>

					@elseif($category->posts()->count() == 1 )

						<small>{{ $category->posts()->count() }} post</small>

					@else

					<small>
						{{ $category->posts()->count() }} posts
					</small>
					@endif
				</h2>
			</div>

			<div class="col-md-4" style="margin-top: 20px;">
				<div class="col-md-6">	
					<a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary pull-right"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
				</div>

				<div class="col-md-6">	
					<form action="{{ route('categories.destroy', $category->id) }}" method="POST" role="form">	

					{{ csrf_field() }}\
					{{ method_field('DELETE') }}	
						
					
					<button type="submit" class="btn btn-danger pull-left"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
					</form>
				</div>
			</div>			
		</div>
		
		<div class="row">
			@if($category->posts()->count() > 0)

			<div class="col-md-12">	
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Post Title</th>
							<th>Category</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($category->posts as $post)
							<tr>
								<th>{{ $post->id }}</th>
								<td>{{ $post->title }}</td>
								<td>{{ $post->category->name }}</td>
								<td><a href="{{ route('posts.show', [$post->id]) }}" class="btn btn-default bt-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</a></td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>

			@endif
		</div>
	</div>

@stop
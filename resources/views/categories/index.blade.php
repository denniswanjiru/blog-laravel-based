@extends('layouts.admin')

@section('title', 'Categories')

@section('counter')
	@if(count($categories) > 0)
		<span class="badge badger">{{ $categories->count() }}</span>
	@else
		<small>No categories yet!</small>
	@endif
@stop

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
						</tr>
					</thead>
					<tbody>
						@foreach($categories as $category)
							<tr>
								<th>{{ $category->id }}</th>
								<td><a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a></td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>

			<div class="col-md-4">
				<div class="well">
					<form action="" method="POST" role="form">
						{{ csrf_field() }}
						<legend>New Category</legend>

						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" name="name" class="form-control">
						</div>

						<button type="submit" class="btn btn-primary">Create New Category</button>
					</form>
				</div>

			</div>
		</div>
	</div>

@stop

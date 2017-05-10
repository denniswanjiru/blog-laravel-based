@extends('admin')

@section('title', ' Edit Category')

@section('content')
<div class="row">
	<div class="col-md-4 col-md-offset-4 well">
		<form action="{{ route('categories.update', [$category->id]) }}" method="POST" role="form">
			{{ csrf_field() }}
			{{ method_field('PUT') }}

			<legend>Edit Category</legend>
		
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" name="name" class="form-control" value="{{ $category->name }}">
			</div>		
			
		
			<button type="submit" class="btn btn-success">Update</button>
			<a href="{{ route('categories.show', [$category->id]) }}" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Cancel</a>
		</form>
	</div>
</div>

@stop
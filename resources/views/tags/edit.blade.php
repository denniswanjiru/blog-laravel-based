@extends('admin')

@section('title', ' Edit Tag')

@section('content')
<div class="row">
	<div class="col-md-4 col-md-offset-4 well">
		<form action="{{ route('tags.update', [$tag->id]) }}" method="POST" role="form">
			{{ csrf_field() }}
			{{ method_field('PUT') }}

			<legend>Edit Tag</legend>
		
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" name="name" class="form-control" value="{{ $tag->name }}">
			</div>		
			
		
			<button type="submit" class="btn btn-success">Update</button>
			<a href="{{ route('tags.show', [$tag->id]) }}" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Cancel</a>
		</form>
	</div>
</div>

@stop
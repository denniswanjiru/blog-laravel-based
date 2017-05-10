@extends('admin')

@section('title', 'Tags')

@section('counter')
@if(count($tags) > 0)
	<span class="badge badger">{{ $tags->count() }}</span>
@else
	<small>No tags yet!</small>
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
						@foreach($tags as $tag)
							<tr>
								<th>{{ $tag->id }}</th>
								<td class="text-capitalize"><a href="{{ route('tags.show', [$tag->id]) }} ">{{ $tag->name }}</a></td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>

			<div class="col-md-4">
				<div class="well">
					<form action="" method="POST" role="form">
						{{ csrf_field() }}
						<legend>New Tag</legend>
					
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" name="name" class="form-control">
						</div>					
					
						<button type="submit" class="btn btn-primary">Create New Tag</button>
					</form>
				</div>
				
			</div>
		</div>
	</div>

@stop
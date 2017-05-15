@extends('admin')

@section('title', 'My Profile')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<div class="col-md-4 col-md-offset-1">
				<img class="profile-avatar pull-right img-responsive img-circle" src="images/uploads/avatars/{{ Auth::user()->avatar }}" >
				<h3 class="pull-right"> {{ Auth::user()->name }}</h3>
			</div>
			
			<div class="form col-md-7 profile">
				<legend>About myself</legend>
				<p>{{ Auth::user()->description }}</p>
				<a class="btn btn-purple-purple" data-toggle="modal" href='#modal-id'>Edit Profile</a>
			</div>			
		</div>
	</div>

	<div class="modal fade" id="modal-id">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Update Profile</h4>
				</div>
				<div class="modal-body">
					{!! Form::model(Auth::user(), ['route' => 'admin.profile', 'files' => true ]) !!}
					{{-- <form action="{{ route('admin.profile') }}" method="POST" role="form" enctype="multipart/form-data" > --}}					
						<div class="form-group">
							{{ Form::file('avatar',  null, []) }}
							{{-- <label for="description">Avatar</label>
							<input name="avatar" type="file" value="{{ Auth::user()->avatar }}"> --}}
						</div>
						
						<div class="form-group">
							{{-- <label for="description">About Yourself</label>
							<textarea name="description" class="form-control" rows="6">{{ Auth::user()->description }}</textarea> --}}
							{{ Form::textarea('description',  null, ['class' => 'form-control', 'rows' => '6']) }}
						</div>					
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-purple-purple">Save Changes</button>
				</div>

				{{-- {{ csrf_field() }}
					</form> --}}
					{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>	
@stop
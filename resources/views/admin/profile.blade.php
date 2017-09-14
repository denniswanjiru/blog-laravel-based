@extends('layouts.main')

@section('title', 'My Profile')

@section('content')
<div class="container">
	.<div class="row spacer">
		<div class="">
			<h3>My Profile</h3>
		</div>
	</div>
	<div class="row sm-spacer">
		<div class="col-md-9">
			<div class="col-md-4 col-md-offset-1">
				<img class="profile-avatar pull-right img-responsive img-circle" src="images/uploads/avatars/{{ Auth::user()->avatar }}">
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
					{!! Form::model($user, ['route' => 'admin.profile', 'files' => true ]) !!}

						<div class="form-group">
							{{ Form::file('avatar',  null, []) }}
						</div>

						<div class="form-group">
							{{ Form::textarea('description',  null, ['class' => 'form-control', 'rows' => '6']) }}
						</div>

				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-purple-purple">Save Changes</button>
				</div>

				 {!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@stop

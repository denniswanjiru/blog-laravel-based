@extends('main')

@section('title', ' Contact')

@section('content')

<div class="row">
	<div class="container spacer">
		<div class="col-md-12 text-center">
			<h2><i class="fa fa-mobile" aria-hidden="true"></i> Contact Us</h2>
		</div>
	</div>
</div>

<hr>
	
<div class="row">
	<div class="container">
		<div class="col-md-6 col-md-offset-3 pt-spacer blue-form">
			<form action="{{ route('layouts.contact') }}" method="POST" role="form">
			{{ csrf_field() }}

				<legend>Contact Us</legend>
			
				<div class="form-group">
					<label for="email">Email</label>
					<input name="email" type="text" class="form-control" id="" placeholder="Enter your Email" required="required">
				</div>	

				<div class="form-group">
					<label for="subject">Subject</label>
					<input name="subject" type="text" class="form-control" required="required" maxlength="255">
				</div>

				<div class="form-group">
					<label for="message">Message</label>
					<textarea name="message" class="form-control" rows="6" required="required"></textarea>
				</div>					
			
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>

@include('partials._footer')

@stop

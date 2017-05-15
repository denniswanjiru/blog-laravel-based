@extends('admin')

	@section('title', 'Edit Post')
	@section('style')
		{{-- <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script> --}}
		<script src="{{ URL::to('tinymce/js/tinymce/jquery.tinymce.min.js') }}"></script>
		<script src="{{ URL::to('tinymce/js/tinymce/tinymce.min.js') }}"></script>

		<script type="text/javascript">
			tinymce.init({
				selector: 'textarea',
				plugins: "link advlist",
			});
		</script>
	@stop

	@section('content')

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 pt-spacer" style="background-color: #00BFFF; margin-top: 20px;"> 

				   <form action="{{ action('PostController@update', $post->id) }}" method="POST" role="form">				   	
						
						{{ csrf_field() }}
						{{ method_field('PUT') }}

					   	<legend>Edit Post</legend>
					   
					   	<div class="form-group">
					   		<label for="title">Title</label>
					   		<input type="text" name="title" class="form-control input-lg" value="{{ $post->title }}" required="" maxlength="255">
					   	</div>	

					   	<div class="form-group">
					   		<label for="slug">Slug</label>
					   		<input type="text" name="slug" class="form-control" value="{{ $post->slug }}" required="" minlength="5" maxlength="255">
					   	</div>

					   	<div class="form-group">
					   		<label for="category_id">Category</label>
					   		<select name="category_id" id="input" class="form-control" required="required">
					   			@foreach($categories as $category)
					   	   			<option value="{{ $category->id }}">{{ $category->name }}</option>
					   	   		@endforeach
					   	   	</select>
					   	</div> 

					   	<div class="form-group">
					   		<label for="tags">Tag</label>
					   		<select name="tags[]" id="input" class="form-control select2-multi" multiple="multiple">
					   			@foreach($tags as $tag)
					   	   			<option value="{{ $tag->id }}">{{ $tag->name }}</option>
					   	   		@endforeach
					   	   	</select>
					   	</div>

					   	<div class="form-group">
							<label for="body">Body</label>
							<textarea name="body" id="textarea" class="form-control" rows="8">{{ $post->body }}</textarea>
						</div>	 	

					   	<button type="submit" class="btn btn-success">Update</button>

					   	<a href="{{ route('posts.show', $post->id) }}"  class="btn btn-danger" style="margin-left: 10px;">Cancel</a>

				   </form>



				 </div>
			</div>
		</div>  

	@stop

	@section('scripts')
		<script>
			$('.select2-multi').select2();
			// 
		</script>
	@stop
@extends('admin')

	@section('title', 'Compose New Post') 

	@section('style')
		<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
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
				<div class="col-md-6 col-md-offset-3 pt-spacer blue-form"> 

				   	<form action="{{ route('posts.store') }}" method="POST" role="form" enctype="multipart/form-data" data-parsley-validate="">
						
						{{ csrf_field() }}

					   	<legend>Compose New Post</legend>
					   
					   	<div class="form-group text-capitalize">
					   		<label for="title">Title</label>
					   		<input type="text" name="title" class="form-control input-lg" required="" maxlength="255">
					   	</div>	

					   	<div class="form-group">
					   		<label for="slug">Slug</label>
					   		<input type="text" name="slug" class="form-control" required="" minlength="5" maxlength="255">
					   	</div>

					   	<div class="form-group">
					   		<label for="image">Image</label>
					   		<input type="file" name="image">
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
							<textarea name="body" class="form-control" rows="8"></textarea>
						</div>	

					   	<button type="submit" class="btn btn-success">Compose Post</button>
				   	</form>

				 </div>
			</div>
		</div>  

	@stop


	@section('scripts')
		<script>
			$('.select2-multi').select2();
		</script>
	@stop
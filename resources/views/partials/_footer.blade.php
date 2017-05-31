<div class="row footer container-spacer">
	<div class="container txt-clr">
		<div class="col-md-4">
			<h2 class="">About Me</h2>

			<p>
				Dennis Wanjiru is a Web | Real-estate | Music Enthusiast. Am skilled in PHP (Laravel) | Javascript (Vuejs, jQuery) | CSS (Bootstrap, Sass). The future of me in tech will include;
				Python (Django) | Data Science | Machine Learning | Nodejs......
			</p>
			<br>
			<a href="#" class="btn btn-purple">FIND OUT MORE</a>

			<div class="txt-clr social-icons">			
				<a href="#"><i class="icon-color fa fa-2x fa-facebook" aria-hidden="true"></i></a>
				<a href="#"><i class="icon-color fa fa-2x fa-twitter " aria-hidden="true"></i></a>
				<a href="#"><i class="icon-color fa fa-2x fa-instagram " aria-hidden="true"></i></a>
				<a href="#"><i class="icon-color fa fa-2x fa-pinterest " aria-hidden="true"></i></a>
				<a href="#"><i class="icon-color fa fa-2x fa-github" aria-hidden="true"></i></a>			
			</div>
		</div>

		<div class="col-md-4 footer-popular">
			<h4><strong>MOST VIEWED</strong></h4>

			<div class="row footer-popular-info">
				<img src="" class="footer-img">
				<h5 class="footer-post-title">These 7 things will change the way you approach travel</h5>
				<p class="comment-time">6575 views</p>
				<br>
			</div>

			<div class="row footer-popular-info">
				<img src="" class="footer-img">
				<h5 class="footer-post-title">These 7 things will change the way you approach travel</h5>
				<p class="comment-time">4938 views</p>
				<br>
			</div>

			<div class="row footer-popular-info">
				<img src="" class="footer-img">
				<h5 class="footer-post-title">These 7 things will change the way you approach travel</h5>
				<p class="comment-time">3728 views</p>
				<br>
			</div>

		</div>

		<div class="col-md-4 footer-popular">
			<h4><strong>MOST DISCUSSED</strong></h4>
			@foreach ($populars as $popular)
				<div class="row footer-popular-info">
					<a href="{{ route('blog.single', [$popular->slug]) }}"><img class="footer-img img-responsive" src="{{ asset('/images/uploads/posts'.$popular->image) }}"></a>
					<h5 class="footer-post-title">{{ $popular->title }}</h5>
					<p class="comment-time">{{ $popular->comments->count() }} comments</p>
				</div>
				<br>
			@endforeach
		</div>

	</div>
</div>

<div class="row copyright text-center">
	
</div>

<div class="row copyright  text-center">
	<div class="txt-clr copyright-info">
		<p style="font-size: 14px;">All Rights Reserved Copyright &copy 2017</p>
	</div>
</div>

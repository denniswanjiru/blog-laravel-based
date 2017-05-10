<!DOCTYPE html>
<html lang="en">
<head>
	@include('partials._head')
</head>
<body>
	<div class="row">
		@include('partials._menu')
	</div>
	<div id="wrapper" style="margin-top: 50px;">

			@include('partials._sidenav')

			<!-- Page Content -->
			<div id="page-content-wrapper">
				<div class="container-fluid">
					<div class="row">
						@include('partials._messages')
					</div>
					<div class="row">
						<div class="col-md-2">
							<a href="#menu-toggle" class="btn btn-primary" id="menu-toggle" style="margin-top: 20px;">
								Dashboard
							</a>
						</div>

						<div class="col-md-8 col-md-offset-2">
							<h1> @yield('title')@yield('counter')</h1>
						</div>					
						
					</div><hr>			
				</div>
				<div>
					@yield('content')
				</div>
				
			</div>
	</div>
	@include('partials._scripts') 
</body>
</html>
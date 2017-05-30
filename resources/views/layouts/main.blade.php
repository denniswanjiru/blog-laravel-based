<!DOCTYPE html>
<html lang="en">
<head>
   @include('partials._head')	
</head>

<body>	
	{{-- @include('partials._header-menu') --}}

	@include('partials._menu')

   	@yield('content')

	@include('partials._scripts')    
</body>
</html>
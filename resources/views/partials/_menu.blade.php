<nav class="navbar navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Health</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="{{ Request::is('/') ? "active" : "" }}"><a href="{{ url('/') }}">Home</a></li>
        <li class="{{ Request::is('about') ? "active" : "" }}"><a href="#">About</a></li>
        <li class="{{ Request::is('contact') ? "active" : "" }}"><a href="{{ route('pages.contact') }}">Contact</a></li>
      </ul>

      {{-- Pulled Right --}}
      <ul class="nav navbar-nav navbar-right" style="padding-right: 80px;">

      @if(Auth::guest())
        <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('register') }}">Register</a></li>
      @else
        <li>
          <img class="avatar-small img-circle" src="{{ asset('images/uploads/avatars/'.Auth::user()->avatar) }}">
        </li>
        <li class="dropdown">
         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            @if (Auth::guard('admin')->check())
              <li><a href="{{ route('admin.profile') }}">Profile</a></li>
              <li><a href="{{ route('posts.index') }}">Dashboard</a></li>
            @else
              <li><a href="{{ route('user.profile') }}">Profile</a></li>
            @endif
            <li role="separator" class="divider"></li>
            <li><a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
          </ul>
        </li>
      @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

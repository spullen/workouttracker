<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">getMoving.fitness</a>
    </div>
    <div class="collapse navbar-collapse">
      @if(Auth::check())
      <ul class="nav navbar-nav">
        <li><a href="{{ action('workouts.index') }}">Workouts</a></li>
        <li><a href="{{ action('goals.index') }}">Goals</a></li>
        <li><a href="{{ action('weight.index') }}">Track Weight</a></li>
      </ul>
      @endif
      <ul class="nav navbar-nav navbar-right">
        @if(!Auth::check())
          <li><a href="{{ url('about') }}">About</a></li>
          <li><a href="{{ action('register.create') }}">Sign up</a></li>
          <li><a href="{{ url('login') }}">Login</a></li>
        @else
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Hello, {{ Auth::user()->name }} <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="{{ action('settings.edit') }}">User Settings</a></li>
              <li><a href="{{ action('notifications.edit') }}">Notification Preferences</a></li>
              <li><a href="{{ action('password.edit') }}">Change Password</a></li>
              <li class="divider"></li>
              <li><a href="{{ url('logout') }}" data-method="delete">Logout</a></li>
            </ul>
          </li>
        @endif
      </ul>
    </div>
  </div>
</nav>
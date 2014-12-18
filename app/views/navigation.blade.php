<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Workout Tracker</a>
    </div>
    <div class="collapse navbar-collapse">
      @if(Auth::check())
      <ul class="nav navbar-nav">
        <li><a href="{{ action('dashboard') }}">Dashboard</a><li>
        <li><a href="{{ action('workouts.index') }}">Workouts</a></li>
        <li><a href="{{ action('goals.index') }}">Goals</a></li>
      </ul>
      @endif
      <ul class="nav navbar-nav navbar-right">
        @if(!Auth::check())
          <li><a href="{{ action('register.create') }}">Sign up</a></li>
          <li><a href="{{ url('login') }}">Login</a></li>
        @else
          <li class="navbar-text">Hello, {{ Auth::user()->name }}</li>
          <li><a href="{{ url('logout') }}" data-method="delete">Logout</a></li>
        @endif
      </ul>
    </div>
  </div>
</nav>
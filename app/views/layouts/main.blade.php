<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Workout Tracker</title>

  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/application.css') }}" />
  <meta content="_token" name="csrf-param" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse">
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
        <li><a href="{{ action('DashboardController@index') }}">Dashboard</a><li>
        <li><a href="{{ action('workouts.index') }}">Workouts</a></li>
        <li><a href="{{ action('goals.index') }}">Goals</a></li>
      </ul>
      @endif
      <ul class="nav navbar-nav navbar-right">
        @if(!Auth::check())
          <li><a href="{{ action('register.create') }}">Sign up</a></li>
          <li><a class="btn btn-default navbar-btn" href="{{ url('login') }}">Login</a></li>
        @else
          <li class="navbar-text">Hello, {{ Auth::user()->name }}</li>
          <li><a href="{{ url('logout') }}" data-method="delete">Logout</a></li>
        @endif
      </ul>
    </div>
  </div>
</nav>
<div class="container">
  @yield('header')
  @if(Session::has('message'))
    <div class="alert alert-success">{{ Session::get('message') }}</div>
  @endif
  @if(Session::has('alert'))
    <div class="alert alert-danger">{{ Session::get('alert') }}</div>
  @endif
  @yield('content')
</div>
@section('javascripts')
  <script src="{{ asset('js/jquery-2.1.1.min.js') }}"></script>
  <script src="{{ asset('js/jquery_ujs.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/moment.js') }}"></script>
  <script src="{{ asset('js/bootstrap-datetimepicker.js') }}"></script>
  <script src="{{ asset('js/application.js') }}"></script>
@show
</body>
</html>
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
<div class="navigation">
  <nav>
    <ul>
      @if(!Auth::check())
        <li><a href="{{ action('register.create') }}">Sign up</a></li>
        <li><a href="{{ url('login') }}">Login</a></li>
      @else
        <li>Hello, {{ Auth::user()->name }}</li>
        <li><a href="{{ url('logout') }}" data-method="delete">Logout</a></li>
      @endif
    </ul>
  </nav>
</div>
<div class="container">
  @if(Session::has('message'))
    <div>{{ Session::get('message') }}</div>
  @endif
  @if(Session::has('alert'))
    <div>{{ Session::get('alert') }}</div>
  @endif
  @yield('content')
</div>
@section('javascripts')
  <script src="{{ asset('js/jquery-2.1.1.min.js') }}"></script>
  <script src="{{ asset('js/jquery_ujs.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/moment.js') }}"></script>
  <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
  <script src="{{ asset('js/application.js') }}"></script>
@show
</body>
</html>
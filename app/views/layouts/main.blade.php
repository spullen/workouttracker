<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Workout Tracker</title>

  @section('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/application.css') }}" />
  @show
  <meta content="_token" name="csrf-param" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div id="main-wrapper">
  @include('navigation')
  <div id="main" role="main" class="container">
    @include('messages')
    @yield('header')
    @yield('content')
  </div>
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
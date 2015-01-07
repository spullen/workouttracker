<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>getMoving.fitness</title>

  @if(App::environment('production'))
    <link rel="stylesheet" type="text/css" href="//assets.getmoving.fitness/css/app.min.css">
  @else
    <link rel="stylesheet" type="text/css" href="//localhost:9000/css/app.css">
  @endif
  <meta content="_token" name="csrf-param" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div id="main-wrapper {{ isset($main_wrapper_class) ? $main_wrapper_class : '' }}">
  @include('navigation')
  <div id="main" role="main">
    @include('messages')
    @yield('header')
    @yield('content')
  </div>
</div>
@if(App::environment('production'))
<script src="//assets.getmoving.fitness/js/app.min.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-57967867-1', 'auto');
  ga('send', 'pageview');
</script>
@else
<script src="//localhost:9000/js/app.js"></script>
@endif
</body>
</html>
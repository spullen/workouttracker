<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>getMoving.fitness</title>

  @section('stylesheets')
    {{ stylesheet_link_tag() }}
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
  {{ javascript_include_tag() }}
@show
@if(App::environment('production'))
<!--
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-XXXXXXXX-X', 'auto');
  ga('send', 'pageview');

</script>
-->
@endif
</body>
</html>
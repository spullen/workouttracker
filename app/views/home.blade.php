@extends('layouts.main')

@section('stylesheets')
  @parent
  {{ stylesheet_link_tag('home') }}
@stop

@section('content')
<div class="container">
  <div class="row">
    <div id="about" class="col-md-12">
      <div id="about-content">
        <h1>Welcome to workout tracker!</h1>

        <h2>
          Workout tracker allows you to log your workouts. You can also set up goals to track your progress. Setting up goals can motivate you to get in shape and/or stay fit!
        </h2>

        @if(Auth::check())
        <h3>
          <a class="btn btn-success btn-lg" href="{{ action('DashboardController@index') }}">View Dashboard</a>
        </h3>
        @else
        <h3>
          <a class="btn btn-primary btn-lg" href="{{ action('register.create') }}">Create Account</a>, or 
          <a class="btn btn-success btn-lg" href="{{ url('login') }}">Login</a> if you already have an accout.
        </h3>
        @endif
      </div>
    </div>
  </div>
</div>
@stop
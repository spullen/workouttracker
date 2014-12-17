@extends('layouts.main')

@section('header')
<div class="container">
  <div class="page-header">
    <h1>Dashboard</h1>
  </div>
</div>
@stop

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <a class="btn btn-info" href="{{ URL::route('workouts.create') }}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Log Workout</a>
      <a class="btn btn-info" href="{{ URL::route('goals.create') }}"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Create Goal</a>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <h2>Goals</h2>

      @if(count($activeGoals))
        <p><a href="{{ URL::route('goals.create') }}">Create New Goal</a></p>

        <table class="table table-bordered table-striped table-responsive">
          <thead>
            <tr>
              <th>Title</th>
              <th>Activity</th>
              <th>Metric</th>
              <th>Current Amount</th>
              <th>Target Amount</th>
              <th>Target Date</th>
            </tr>
          </thead>
          <tbody>
            @foreach($activeGoals as $goal)
              <tr class="{{ $goal->overdue() ? 'warning' : '' }}">
                <td><a href="{{ URL::route('goals.show', array($goal->id)) }}">{{ $goal->displayTitle() }}</a></td>
                <td>{{ $goal->activity->name }}</td>
                <td>{{ $goal->metric->name }}</td>
                <td>{{ $goal->current_amount }}</td>
                <td>{{ $goal->target_amount }}</td>
                <td>{{ $goal->target_date }}</td>
              </tr>
              <tr>
                <td colspan="6">
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="{{ $goal->percentAccomplished() }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $goal->percentAccomplished() }}%;">
                      {{ $goal->percentAccomplished() }}%
                    </div>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @else
        <p>
          You currently don't have any goals to accomplish :(
        </p>
        <p>
          Setting goals is a great way to keep in shape! Go ahead and <a href="{{ URL::route('goals.create') }}">add some!</a>
        </p>
      @endif
    </div>
  </div>
  @if(count($recentlyAccomplishedGoals))
  <div class="row">
    <div class="col-md-12">
      <h2>Recently Accomplished Goals</h2>

      <p>Nice job! Here are some of your recently accomplished goals from the past week. Keep up the good work!</p>

      <table class="table table-bordered table-striped table-responsive">
        <thead>
          <tr>
            <th>Title</th>
            <th>Activity</th>
            <th>Metric</th>
            <th>Current Amount</th>
            <th>Target Amount</th>
            <th>Target Date</th>
            <th>Accomplished Date</th>
          </tr>
        </thead>
        <tbody>
          @foreach($recentlyAccomplishedGoals as $goal)
            <tr>
              <tr>
                <td><a href="{{ URL::route('goals.show', array($goal->id)) }}">{{ $goal->displayTitle() }}</a></td>
                <td>{{ $goal->activity->name }}</td>
                <td>{{ $goal->metric->name }}</td>
                <td>{{ $goal->current_amount }}</td>
                <td>{{ $goal->target_amount }}</td>
                <td>{{ $goal->target_date }}</td>
                <td>{{ $goal->accomplished_date }}</td>
              </tr>
            </tr>
          @endforeach
        </tbody>
      </table>

      <p><a href="{{ URL::route('goals.index') }}">View All</a><p>
    </div>
  </div>
  @endif
  <div class="row">
    <div class="col-md-12">
      <h2>Recently Logged Workouts</h2>

      @if(count($recentlyLoggedWorkouts))
        <p><a href="{{ URL::route('workouts.create') }}">Log Workout</a></p>

        <table class="table table-bordered table-striped table-responsive">
          <thead>
            <tr>
              <th>Activity</th>
              <th>Metric</th>
              <th>Amount</th>
              <th>Duration (in minutes)</th>
            </tr>
          </thead>
          <tbody>
            @foreach($recentlyLoggedWorkouts as $workout)
              <tr>
                <td><a href="{{ URL::route('workouts.show', array($workout->id)) }}">{{ $workout->activity->name }}</a></td>
                <td>{{ $workout->metric->name }}</td>
                <td>{{ $workout->amount }}</td>
                <td>@include('_duration', array('hours' => $workout->duration_hours, 'minutes' => $workout->duration_minutes))</td>
              </tr>
            @endforeach
          </tbody>
        </table>

        <p><a href="{{ URL::route('workouts.index') }}">View All</a><p>
      @else
        <p>You don't have any logged workouts, <a href="{{ URL::route('workouts.create') }}">have any to log?</a></p>
      @endif
    </div>
  </div>
</div>
@stop
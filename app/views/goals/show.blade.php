@extends('layouts.main')

@section('header')
<div class="page-header">
  <h1>{{{ $goal->title }}}</h1>
  <div>
    <a href="{{ URL::route('goals.edit', array($goal->id)) }}" class="btn btn-info">Edit</a>
    <a href="{{ URL::route('goals.destroy', array($goal->id)) }}" class="btn btn-danger" data-method="delete" data-confirm="Are you sure you want to delete this goal?">Delete</a> 
  </div>
</div>
@stop

@section('content')
<div class="row">
  <div class="col-md-12">
    @if($goal->accomplished_date)
      <div class="alert alert-success">Woot! You did it! Accomplished on {{ $goal->accomplished_date }}</div>
    @else
      <div class="progress">
        <div class="progress-bar" role="progressbar" aria-valuenow="{{ $goal->percent_accomplished }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $goal->percent_accomplished }}%;">
          {{ $goal->percent_accomplished }}%
        </div>
      </div>

      <p>Go! Go! Go! You can do it!</p>
      <p><a href="{{ URL::route('workouts.create') }}">Log workout</a></p>
    @endif
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <dl>
      <dt>Activity Type</dt>
      <dd>{{ $goal->activity->name }}</dd>

      <dt>Metric</dt>
      <dd>{{ $goal->metric }}</dd>

      <dt>Current Amount</dt>
      <dd>{{ $goal->current_amount }}</dd>

      <dt>Target Amount</dt>
      <dd>{{ $goal->target_amount }}</dd>

      <dt>Target Date</dt>
      <dd>{{ $goal->target_date }}</dd>
    </dl>
  </div>
</div>

@if(count($workouts))
<div class="row">
  <div class="col-md-12">
    <table class="table table-striped table-bordered table-responsive">
      <thead>
        <tr>
          <th>Activity</th>
          <th>Metric</th>
          <th>Amount</th>
          <th>Duration (in minutes)</th>
        </tr>
      </thead>
      <tbody>
        @foreach($workouts as $workout)
          <tr>
            <td><a href="{{ URL::route('workouts.show', array($workout->id)) }}">{{ $workout->activity->name }}</a></td>
            <td>{{ $workout->metric }}</td>
            <td>{{ $workout->amount }}</td>
            <td>{{ $workout->duration }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endif

@stop

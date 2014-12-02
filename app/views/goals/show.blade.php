@extends('layouts.main')

@section('header')
<div class="page-header">
  <h1>{{{ $goal->title }}}</h1>
  <div>
    <a href="{{ URL::route('goals.edit', array($goal->id)) }}" class="btn btn-info">Edit</a>
    <a href="{{ URL::route('goals.destroy', array($goal->id)) }}" class="btn btn-danger" data-method="delete" data-confirm="Are you sure you want to delete workout?">Delete</a> 
  </div>
</div>
@stop

@section('content')
<div class="row">
  <div class="col-md-6">
    <dl>
      <dt>Activity Type</dt>
      <dd>{{ $goal->activity->name }}</dd>

      <dt>Metric</dt>
      <dd>{{ $goal->metric }}</dd>

      <dt>Target Amount</dt>
      <dd>{{ $goal->targetAmount }}</dd>

      <dt>Target Date</dt>
      <dd>{{ $goal->targetDate }}</dd>

      <dt>Current Amount</dt>
      <dd>{{ $goal->currentAmount }}</dd>
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

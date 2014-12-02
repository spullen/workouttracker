@extends('layouts.main')

@section('header')
<div class="page-header">
  <h1>{{{ $goal->title }}} @unless($goal->accomplished_date)({{ $goal->percent_accomplished }}% to goal)@endif</h1>
  <div>
    <a href="{{ URL::route('goals.edit', array($goal->id)) }}" class="btn btn-info">Edit</a>
    <a href="{{ URL::route('goals.destroy', array($goal->id)) }}" class="btn btn-danger" data-method="delete" data-confirm="Are you sure you want to delete this goal?">Delete</a> 
  </div>
</div>
@stop

@section('content')
<div class="row">
  <div class="col-md-6">
    @if($goal->accomplished_date)
      <div class="alert alert-success">Woot! You did it! Accomplished on {{ $goal->accomplished_date }}</div>
    @endif

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

    <a href="{{ URL::route('workouts.create') }}">Log workout</a>
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

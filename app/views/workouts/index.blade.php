@extends('layouts.main')

@section('header')
<div class="container">
  <div class="page-header">
    <h1>Workouts</h1>
  </div>
</div>
@stop

@section('content')
  <p><a href="{{ URL::route('workouts.create') }}">Log workout</a></p>

  @if(count($workouts))
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

    <div class="pagination">
      {{ $workouts->links() }}
    </div>
  @else
    <p>
      You don't have any workouts logged! Get out and do something, then <a href="{{ URL::route('workouts.create') }}">log it!</a>
    </p>
  @endif
@stop
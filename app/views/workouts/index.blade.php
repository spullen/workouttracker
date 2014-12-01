@extends('layouts.main')

@section('content')
  <div class="page-header">
    <h1>Workout List</h1>
  </div>

  <p><a href="{{ URL::route('workouts.create') }}">Log workout</a></p>

  @if(count($workouts))
    <table class="table table-striped table-bordered table-responsive">
      <thead>
        <tr>
          <th>Activity</th>
          <th>Metric</th>
          <th>Amount</th>
          <th>Start</th>
          <th>Duration</th>
        </tr>
      </thead>
      <tbody>
        @foreach($workouts as $workout)
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
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
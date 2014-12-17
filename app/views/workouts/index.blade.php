@extends('layouts.main')

@section('header')
<div class="container">
  <div class="page-header">
    <h1>{{ trans('workouts.index.title') }}</h1>
  </div>
</div>
@stop

@section('content')
<div class="container">
  <p><a href="{{ URL::route('workouts.create') }}">{{ trans('workouts.log_workout') }}</a></p>

  @if(count($workouts))
    <table class="table table-striped table-bordered table-responsive">
      <thead>
        <tr>
          <th>{{ trans('workouts.activity.label') }}</th>
          <th>{{ trans('workouts.metric.label') }}</th>
          <th>{{ trans('workouts.amount.label') }}</th>
          <th>{{ trans('workouts.duration.label') }}</th>
        </tr>
      </thead>
      <tbody>
        @foreach($workouts as $workout)
          <tr>
            <td><a href="{{ URL::route('workouts.show', array($workout->id)) }}">{{ $workout->activity->name }}</a></td>
            <td>{{ $workout->metric->name }}</td>
            <td>{{ $workout->amount }}</td>
            <td>@include('_duration', array('hours' => $workout->duration_hours, 'minutes' => $workout->duration_minutes))</td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <div class="pagination">
      {{ $workouts->links() }}
    </div>
  @else
    <p>
      {{ trans('workouts.no_workouts_log_it', array('create_url' => URL::route('workouts.create'))) }}
    </p>
  @endif
</div>
@stop
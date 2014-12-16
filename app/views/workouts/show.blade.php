@extends('layouts.main')

@section('header')
<div class="page-header">
  <h1>{{ $workout->activity->name }}</h1>
  @if(Authority::can('update', $workout))
  <div>
    <a href="{{ URL::route('workouts.edit', array($workout->id)) }}" class="btn btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a>
    <a href="{{ URL::route('workouts.destroy', array($workout->id)) }}" class="btn btn-danger" data-method="delete" data-confirm="Are you sure you want to delete workout?"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a> 
  </div>
  @else
  <p class="alert alert-info"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> You cannot edit a workout after 24 hours.</p>
  @endif
</div>
@stop

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <dl>
        <dt>Metric</dt>
        <dd>{{ $workout->metric->name }}</dd>

        <dt>Amount</dt>
        <dd>{{ $workout->amount }}</dd>

        <dt>Duration</dt>
        <dd>
          @if($workout->duration_hours > 0)
            {{ $workout->duration_hours }} hours
          @endif
          {{ $workout->duration_minutes }} minutes
        </dd>
      </dl>

      @if($workout->notes)
      <h4>Notes:</h4>
      <p>{{ nl2br(e($workout->notes)) }}<p>
      @endif
    </div>
  </div>
</div>
@stop

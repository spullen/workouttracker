@extends('layouts.main')

@section('header')
<div class="page-header">
  <h1>{{ $workout->activity->name }}</h1>
  <div>
    <a href="{{ URL::route('workouts.edit', array($workout->id)) }}" class="btn btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a>
    <a href="{{ URL::route('workouts.destroy', array($workout->id)) }}" class="btn btn-danger" data-method="delete" data-confirm="Are you sure you want to delete workout?"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a> 
  </div>
</div>
@stop

@section('content')
<div class="row">
  <div class="col-md-6">
    <dl>
      <dt>Metric</dt>
      <dd>{{ $workout->metric }}</dd>

      <dt>Amount</dt>
      <dd>{{ $workout->amount }}</dd>

      <dt>Duration</dt>
      <dd>{{ $workout->duration }} minutes</dd>
    </dl>

    <h4>Notes:</h4>
    <p>{{{ $workout->notes }}}<p>
  </div>
</div>
@stop

@extends('layouts.main')

@section('header')
<div class="page-header">
  <h1>{{ $workout->activity->name }}</h1>
  @if(Authority::can('update', $workout))
  <div>
    <a href="{{ URL::route('workouts.edit', array($workout->id)) }}" class="btn btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> {{ trans('messages.edit.label') }}</a>
    <a href="{{ URL::route('workouts.destroy', array($workout->id)) }}" class="btn btn-danger" data-method="delete" data-confirm="{{ trans('workouts.delete_confirmation') }}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> {{ trans('messages.delete.label') }}</a> 
  </div>
  @else
  <p class="alert alert-info"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> {{ trans('workouts.cannot_edit_after_24_hours') }}</p>
  @endif
</div>
@stop

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <dl>
        <dt>{{ trans('workouts.metric.label') }}</dt>
        <dd>{{ $workout->metric->name }}</dd>

        <dt>{{ trans('workouts.amount.label') }}</dt>
        <dd>{{ $workout->amount }}</dd>

        <dt>{{ trans('workouts.duration.label') }}</dt>
        <dd>@include('_duration', array('hours' => $workout->duration_hours, 'minutes' => $workout->duration_minutes))</dd>
      </dl>

      @if($workout->notes)
      <h4>{{ trans('workouts.notes.label') }}:</h4>
      <p>{{ nl2br(e($workout->notes)) }}<p>
      @endif
    </div>
  </div>
</div>
@stop

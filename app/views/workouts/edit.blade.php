@extends('layouts.main')

@section('header')
<div class="container">
  <div class="page-header">
    <h1>Edit Workout</h1>
  </div>
</div>
@stop

@section('content')
  {{ Form::model($workout, ['method' => 'put', 'action' => ['WorkoutsController@update', $workout->id], 'class' => 'form-horizontal']) }}
    <div class="form-group">
      {{ Form::label('activity_id', 'Activity Type', array('class' => 'control-label col-md-2')) }}
      <div class="col-md-6">
        <span class="form-control" disabled>{{ $workout->activity->name }}</span>
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('metric', 'Metric', array('class' => 'control-label col-md-2')) }}
      <div class="col-md-6">
        <span class="form-control" disabled>{{ $workout->metric }}</span>
      </div>
    </div>
    @include('workouts._form')
    <div class="form-group">
      <div class="col-md-offset-2 col-md-6">
        {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
      </div>
    </div>
  {{ Form::close() }}
@stop
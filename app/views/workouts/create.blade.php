@extends('layouts.main')

@section('header')
<div class="container">
  <div class="page-header">
    <h1>Log Workout</h1>
  </div>
</div>
@stop

@section('content')
<div class="container">
  {{ Form::model($workout, ['method' => 'post', 'action' => 'WorkoutsController@store', 'class' => 'form-horizontal']) }}
    <div class="form-group {{ $errors->has('activity_id') ? 'has-error' : '' }}">
      {{ Form::label('activity_id', 'Activity', array('class' => 'control-label col-md-2')) }}
      <div class="col-md-6">
        {{ Form::select('activity_id', WorkoutHelpers::activities(), $workout->activity_id, array('class' => 'form-control')) }}
        {{ $errors->first('activity_id', '<span class="help-block">:message</span>') }}
      </div>
    </div>
    <div class="form-group {{ $errors->has('metric') ? 'has-error' : '' }}">
      {{ Form::label('metric_id', 'Metric', array('class' => 'control-label col-md-2')) }}
      <div class="col-md-6">
        {{ Form::select('metric_id', WorkoutHelpers::metrics($workout->activity_id), $workout->metric_id, array('class' => 'form-control')) }}
        {{ $errors->first('metric_id', '<span class="help-block">:message</span>') }}
      </div>
    </div>
    @include('workouts._form')
    <div class="form-group">
      <div class="col-md-offset-2 col-md-6">
        {{ Form::submit('Create', array('class' => 'btn btn-lg btn-primary')) }}
      </div>
    </div>
  {{ Form::close() }}
</div>
@stop
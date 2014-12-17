@extends('layouts.main')

@section('header')
<div class="container">
  <div class="page-header">
    <h1>{{ trans('workouts.log_workout') }}</h1>
  </div>
</div>
@stop

@section('content')
<div class="container">
  {{ Form::model($workout, ['method' => 'post', 'action' => 'WorkoutsController@store', 'class' => 'form-horizontal']) }}
    <div class="form-group {{ $errors->has('activity_id') ? 'has-error' : '' }}">
      {{ Form::label('activity_id', trans('workouts.activity.label') . ' *', array('class' => 'control-label col-md-2')) }}
      <div class="col-md-6">
        {{ Form::select('activity_id', WorkoutHelpers::activities(), Input::get('activity_id'), array('class' => 'form-control')) }}
        {{ $errors->first('activity_id', '<span class="help-block">:message</span>') }}
      </div>
    </div>
    <div class="form-group {{ $errors->has('metric_id') ? 'has-error' : '' }}">
      {{ Form::label('metric_id', trans('workouts.metric.label') . ' *', array('class' => 'control-label col-md-2')) }}
      <div class="col-md-6">
        {{ Form::select('metric_id', WorkoutHelpers::metrics(Input::get('activity_id')), Input::get('metric_id'), array('class' => 'form-control')) }}
        {{ $errors->first('metric_id', '<span class="help-block">:message</span>') }}
      </div>
    </div>
    @include('workouts._form')
    <div class="form-group">
      <div class="col-md-offset-2 col-md-6">
        {{ Form::submit(trans('messages.create.label'), array('class' => 'btn btn-lg btn-primary')) }}
      </div>
    </div>
  {{ Form::close() }}
</div>
@stop
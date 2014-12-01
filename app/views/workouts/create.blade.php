@extends('layouts.main')

@section('content')
  {{ Form::model($workout, ['method' => 'post', 'action' => 'WorkoutsController@store']) }}
    <div class="form-group">
      {{ Form::label('activity_id', 'Activity Type', array('class' => 'control-label')) }}
      <div>
        {{ Form::select('activity_id', WorkoutHelpers::activities(), $workout->activity_id, array('class' => 'form-control')) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('metric', 'Metric', array('class' => 'control-label')) }}
      <div>
        {{ Form::select('metric', WorkoutHelpers::metrics(), $workout->metric, array('class' => 'form-control')) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('amount', 'Amount', array('class' => 'control-label')) }}
      <div>
        {{ Form::text('amount', $workout->amount, array('class' => 'form-control')) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('start', 'Start') }}
      <div>
        {{ Form::text('start', $workout->start, array('class' => 'form-control datetimepicker')) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('duration', 'Duration (in minutes)') }}
      <div>
        {{ Form::text('duration') }}
      </div>
    </div>
  {{ Form::close() }}
@stop
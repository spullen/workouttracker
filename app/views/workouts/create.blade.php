@extends('layouts.main')

@section('content')
  {{ Form::model($workout, ['method' => 'post', 'action' => 'WorkoutsController@store']) }}
    <div class="form-group">
      {{ Form::label('activity_id', 'Activity Type', array('class' => 'control-label')) }}
      <div>
        {{ Form::select('activity_id', WorkoutHelpers::activities(), array('class' => 'form-control')) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('metric', 'Metric', array('class' => 'control-label')) }}
      <div>
        {{ Form::select('metric', WorkoutHelpers::metrics()) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('amount', 'Amount', array('class' => 'control-label')) }}
      <div>
        {{ Form::text('amount', Input::get('amount', 1), array('class' => 'form-control')) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('start', 'Start') }}
      <div>
        {{ Form::text('start', Input::get('start', null), array('class' => 'form-control datetimepicker')) }}
      </div>
    </div>
  {{ Form::close() }}
@stop
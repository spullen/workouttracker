@extends('layouts.main')

@section('header')
<div class="container">
  <div class="page-header">
    <h1>Edit Goal</h1>
  </div>
</div>
@stop

@section('content')
<div class="container">
  {{ Form::model($goal, ['method' => 'put', 'action' => ['GoalsController@update', $goal->id], 'class' => 'form-horizontal']) }}
    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
      {{ Form::label('title', 'Title', array('class' => 'control-label col-md-2')) }}
      <div class="col-md-6">
        {{ Form::text('title', Input::get('title'), array('class' => 'form-control col-md-2')) }}
        {{ $errors->first('title', '<span class="help-block">:message</span>') }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('activity_id', 'Activity Type', array('class' => 'control-label col-md-2')) }}
      <div class="col-md-6">
        <span class="form-control" disabled>{{ $goal->activity->name }}</span>
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('metric', 'Metric', array('class' => 'control-label col-md-2')) }}
      <div class="col-md-6">
        <span class="form-control" disabled>{{ $goal->metric->name }}</span>
      </div>
    </div>
    @include('goals._form')
    <div class="form-group">
      <div class="col-md-offset-2 col-md-6">
        {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
      </div>
    </div>
  {{ Form::close() }}
</div>
@stop
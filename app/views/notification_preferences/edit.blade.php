@extends('layouts.main')

@section('header')
<div class="container">
  <div class="page-header">
    <h1>Notification Preferences</h1>
  </div>
</div>
@stop

@section('content')
<div class="container">
  {{ Form::model($setting, ['method' => 'put', 'action' => 'notifications.update', 'class' => 'form-horizontal']) }}
    <div class="form-group">
      {{ Form::label('goal_reminder', 'Upcoming goal target date reminder', array('class' => 'control-label col-md-2')) }}
      <div class="col-md-10">
        <div class="checkbox">
          <label>
            {{ Form::checkbox('goal_reminder', '1') }}
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('missed_goal_target', 'Missed goal target', array('class' => 'control-label col-md-2')) }}
      <div class="col-md-10">
        <div class="checkbox">
          <label>
            {{ Form::checkbox('missed_goal_target', '1') }}
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('no_active_goals', 'No recently added goals', array('class' => 'control-label col-md-2')) }}
      <div class="col-md-10">
        <div class="checkbox">
          <label>
            {{ Form::checkbox('no_active_goals', '1') }}
          </label>
        </div>
      </div>
    </div>
    {{-- TODO: progress_report, new_features, deals when those are fleshed out --}}
    <div class="form-group">
      <div class="col-md-offset-2 col-md-6">
        {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
      </div>
    </div>
  {{ Form::close() }}
</div>
@stop
@extends('layouts.main')

@section('header')
<div class="container">
  <div class="page-header">
    <h1>User Settings</h1>
  </div>
</div>
@stop

@section('content')
<div class="container">
  {{ Form::model($setting, ['method' => 'put', 'action' => 'settings.update', 'class' => 'form-horizontal']) }}
    <div class="form-group {{ $errors->has('timezone') ? 'has-error' : '' }}">
      {{ Form::label('timezone', 'Timezone *', array('class' => 'control-label col-md-2')) }}
      <div class="col-md-6">
        {{ Timezone::selectForm(Input::get('timezone', $setting->timezone), 'Select a timezone...', array('class' => 'form-control', 'name' => 'timezone')) }}
        {{ $errors->first('timezone', '<span class="help-block">:message</span>') }}
      </div>
    </div>
    {{-- TODO: add language once more are supported --}}
    <div class="form-group {{ $errors->has('weight_unit') ? 'has-error' : '' }}">
      {{ Form::label('weight_unit', 'Weight Units *', array('class' => 'control-label col-md-2')) }}
      <div class="col-md-6">
        <label class="radio-inline">
          {{ Form::radio('weight_unit', 'lb', true) }} Pounds
        </label>
        <label class="radio-inline">
          {{ Form::radio('weight_unit', 'kg') }} Kilograms
        </label>
        {{ $errors->first('weight_unit', '<span class="help-block">:message</span>') }}
      </div>
    </div>
    <div class="form-group {{ $errors->has('distance_unit') ? 'has-error' : '' }}">
      {{ Form::label('weight_unit', 'Distance Units *', array('class' => 'control-label col-md-2')) }}
      <div class="col-md-6">
        <label class="radio-inline">
          {{ Form::radio('distance_unit', 'mi', true) }} Miles
        </label>
        <label class="radio-inline">
          {{ Form::radio('distance_unit', 'km') }} Kilometers
        </label>
        {{ $errors->first('distance_unit', '<span class="help-block">:message</span>') }}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-offset-2 col-md-6">
        {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
      </div>
    </div>
  {{ Form::close() }}
</div>
@stop
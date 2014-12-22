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
    <div class="form-group {{ $errors->has('') ? 'has-error' : '' }}">
      {{ Form::label('', '', array('class' => 'control-label col-md-2')) }}
      <div class="col-md-6">
        {{ $errors->first('', '<span class="help-block">:message</span>') }}
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
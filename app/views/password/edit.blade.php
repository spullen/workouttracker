@extends('layouts.main')

@section('header')
<div class="container">
  <div class="page-header">
    <h1>Password Update</h1>
  </div>
</div>
@stop

@section('content')
  {{ Form::open(array('action' => 'password.update', 'method' => 'put', 'class' => 'form-horizontal')) }}
    <div class="form-group {{ $errors->has('current_password') ? 'has-error' : '' }}">
      {{ Form::label('current_password', 'Current Password *', array('class' => 'control-label col-md-2')) }}
      <div class="col-md-6">
        {{ Form::password('current_password', array('class' => 'form-control')) }}
        {{ $errors->first('current_password', '<span class="help-block">:message</span>') }}
      </div>
    </div>
    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
      {{ Form::label('password', 'New Password *', array('class' => 'control-label col-md-2')) }}
      <div class="col-md-6">
        {{ Form::password('password', array('class' => 'form-control')) }}
        {{ $errors->first('password', '<span class="help-block">:message</span>') }}
      </div>
    </div>
    <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
      {{ Form::label('password_confirmation', 'New Password confirmation *', array('class' => 'control-label col-md-2')) }}
      <div class="col-md-6">
        {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
        {{ $errors->first('password_confirmation', '<span class="help-block">:message</span>') }}
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        {{ Form::submit('Change Password', array('class' => 'btn btn-lg btn-primary')) }}
      </div>
    </div>
  {{ Form::close() }}
@stop
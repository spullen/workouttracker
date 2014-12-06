@extends('layouts.main')

@section('header')
<div class="container">
  <div class="page-header">
    <h1>Sign Up</h1>
  </div>
</div>
@stop

@section('content')
  <form action="{{ action('register.store') }}" method="POST" class="form-horizontal">
    {{ Form::token() }}
    
    <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
      {{ Form::label('first_name', 'First name', array('class' => 'control-label col-md-2')) }}
      <div class="col-md-6">
        {{ Form::text('first_name', Input::get('first_name'), array('class' => 'form-control')) }}
        {{ $errors->first('first_name', '<span class="help-block">:message</span>') }}
      </div>
    </div>
    <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
      {{ Form::label('last_name', 'Last name', array('class' => 'control-label col-md-2')) }}
      <div class="col-md-6">
        {{ Form::text('last_name', Input::get('last_name'), array('class' => 'form-control')) }}
        {{ $errors->first('last_name', '<span class="help-block">:message</span>') }}
      </div>
    </div>
    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
      {{ Form::label('email', 'Email', array('class' => 'control-label col-md-2')) }}
      <div class="col-md-6">
        {{ Form::text('email', Input::get('email'), array('class' => 'form-control')) }}
        {{ $errors->first('email', '<span class="help-block">:message</span>') }}
      </div>
    </div>
    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
      {{ Form::label('password', 'Password', array('class' => 'control-label col-md-2')) }}
      <div class="col-md-6">
        {{ Form::password('password', array('class' => 'form-control')) }}
        {{ $errors->first('password', '<span class="help-block">:message</span>') }}
      </div>
    </div>
    <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
      {{ Form::label('password_confirmation', 'Password confirmation', array('class' => 'control-label col-md-2')) }}
      <div class="col-md-6">
        {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
        {{ $errors->first('password_confirmation', '<span class="help-block">:message</span>') }}
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        {{ Form::submit('Sign Up', array('class' => 'btn btn-primary')) }}
      </div>
    </div>
  </form>
@stop
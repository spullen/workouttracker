@extends('layouts.main')

@section('header')
<div class="container">
  <div class="page-header">
    <h1>Login</h1>
  </div>
</div>
@stop

@section('content')
  <form action="{{ action('SessionController@store') }}" method="POST" class="form-horizontal">
    {{ Form::token() }}
    
    <div class="form-group">
      {{ Form::label('email', 'Email', array('class' => 'control-label col-md-2')) }}
      <div class="col-md-4">
        {{ Form::text('email', Input::get('email'), array('class' => 'form-control')) }}
        {{ $errors->first('email', '<span class="help-block">:message</span>') }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('password', 'Password', array('class' => 'control-label col-md-2')) }}
      <div class="col-md-4">
        {{ Form::password('password', array('class' => 'form-control')) }}
        {{ $errors->first('password', '<span class="help-block">:message</span>') }}
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label>
            {{ Form::checkbox('remember', '1') }} Remember me?
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        {{ Form::submit('Login', array('class' => 'btn btn-primary')) }}
      </div>
    </div>
  </form>
@stop
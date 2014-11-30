@extends('layouts.main')

@section('content')
  <h2>Login</h2>

  <form action="{{ action('SessionController@store') }}" method="POST">
    {{ Form::token() }}
    
    <div class="form-group">
      {{ Form::label('email', 'Email') }}
      <div>
        {{ Form::text('email', Input::get('email')) }}
        {{ $errors->first('email', '<span class="help-block">:message</span>') }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('password', 'Password') }}
      <div>
        {{ Form::password('password') }}
        {{ $errors->first('password', '<span class="help-block">:message</span>') }}
      </div>
    </div>
    <div class="form-group">
      <div class="checkbox">
        <label>
          {{ Form::checkbox('remember', '1') }} Remember me?
        </label>
      </div>
    </div>
    <div class="form-group">
      {{ Form::submit('Login') }}
    </div>
  </form>
@stop
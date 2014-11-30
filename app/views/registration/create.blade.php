@extends('layouts.main')

@section('content')
  <h2>Sign up</h2>

  <form action="{{ action('register.store') }}" method="POST">
    {{ Form::token() }}
    
    <div class="form-group">
      {{ Form::label('first_name', 'First name') }}
      <div>
        {{ Form::text('first_name', Input::get('first_name')) }}
        {{ $errors->first('first_name', '<span class="help-block">:message</span>') }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('last_name', 'Last name') }}
      <div>
        {{ Form::text('last_name', Input::get('last_name')) }}
        {{ $errors->first('last_name', '<span class="help-block">:message</span>') }}
      </div>
    </div>
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
      {{ Form::label('password_confirmation', 'Password confirmation') }}
      <div>
        {{ Form::password('password_confirmation') }}
        {{ $errors->first('password_confirmation', '<span class="help-block">:message</span>') }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::submit('Sign up') }}
    </div>
  </form>
@stop
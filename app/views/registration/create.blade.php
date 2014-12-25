@extends('layouts.main')

@section('header')
<div class="container">
  <div class="page-header">
    <h1>Sign Up</h1>
  </div>
</div>
@stop

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <form action="{{ action('register.store') }}" method="POST" class="form-horizontal">
        {{ Form::token() }}
        
        <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
          {{ Form::label('first_name', 'First name *', array('class' => 'control-label col-md-2')) }}
          <div class="col-md-6">
            {{ Form::text('first_name', Input::get('first_name'), array('class' => 'form-control')) }}
            {{ $errors->first('first_name', '<span class="help-block">:message</span>') }}
          </div>
        </div>
        <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
          {{ Form::label('last_name', 'Last name *', array('class' => 'control-label col-md-2')) }}
          <div class="col-md-6">
            {{ Form::text('last_name', Input::get('last_name'), array('class' => 'form-control')) }}
            {{ $errors->first('last_name', '<span class="help-block">:message</span>') }}
          </div>
        </div>
        <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
          {{ Form::label('gender', 'Gender *', array('class' => 'control-label col-md-2')) }}
          <div class="col-md-6">
            <label class="radio-inline">
              {{ Form::radio('gender', 'm') }} Male
            </label>
            <label class="radio-inline">
              {{ Form::radio('gender', 'f') }} Female
            </label>
            {{ $errors->first('gender', '<span class="help-block">:message</span>') }}
          </div>
        </div>
        <div class="form-group {{ $errors->has('birthdate') ? 'has-error' : '' }}">
          {{ Form::label('birthdate', 'Birthdate *', array('class' => 'control-label col-md-2')) }}
          <div class="col-md-6">
            {{ Form::text('birthdate', Input::get('birthdate'), array('class' => 'form-control datepicker', 'data-date-format' => 'YYYY-MM-DD')) }}
            {{ $errors->first('birthdate', '<span class="help-block">:message</span>') }}
          </div>
        </div>
        <div class="form-group {{ $errors->has('weight') ? 'has-error' : '' }}">
          {{ Form::label('weight', 'Weight', array('class' => 'control-label col-md-2')) }}
          <div class="col-md-6">
            {{ Form::text('weight', Input::get('weight'), array('class' => 'form-control')) }}
            {{ $errors->first('weight', '<span class="help-block">:message</span>') }}
          </div>
        </div>
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
        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
          {{ Form::label('email', 'Email *', array('class' => 'control-label col-md-2')) }}
          <div class="col-md-6">
            {{ Form::text('email', Input::get('email'), array('class' => 'form-control')) }}
            {{ $errors->first('email', '<span class="help-block">:message</span>') }}
          </div>
        </div>
        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
          {{ Form::label('password', 'Password *', array('class' => 'control-label col-md-2')) }}
          <div class="col-md-6">
            {{ Form::password('password', array('class' => 'form-control')) }}
            {{ $errors->first('password', '<span class="help-block">:message</span>') }}
          </div>
        </div>
        <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
          {{ Form::label('password_confirmation', 'Password confirmation *', array('class' => 'control-label col-md-2')) }}
          <div class="col-md-6">
            {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
            {{ $errors->first('password_confirmation', '<span class="help-block">:message</span>') }}
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            {{ Form::submit('Sign Up', array('class' => 'btn btn-lg btn-primary')) }}
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@stop
@extends('layouts.main')

@section('content')
<div class="container">
  {{ Form::model($weight, ['method' => 'post', 'action' => 'weight.store', 'class' => 'form-horizontal']) }}
    <div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
      {{ Form::label('amount', 'Weight *', array('class' => 'control-label col-md-2')) }}
      <div class="col-md-6">
        {{ Form::text('amount', Input::get('amount'), array('class' => 'form-control')) }}
        {{ $errors->first('amount', '<span class="help-block">:message</span>') }}
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-offset-2 col-md-6">
        {{ Form::submit('Log', array('class' => 'btn btn-lg btn-primary')) }}
      </div>
    </div>
  {{ Form::close() }}
</div>
@stop
<div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
  {{ Form::label('amount', 'Amount *', array('class' => 'control-label col-md-2')) }}
  <div class="col-md-6">
    {{ Form::text('amount', Input::get('amount'), array('class' => 'form-control')) }}
    {{ $errors->first('amount', '<span class="help-block">:message</span>') }}
  </div>
</div>
<div class="form-group">
  {{ Form::label('duration', 'Duration *', array('class' => 'control-label col-md-2')) }}
  <div class="col-md-3 {{ $errors->has('duration_hours') ? 'has-error' : '' }}">
    {{ Form::text('duration_hours', Input::get('duration_hours'), array('class' => 'form-control')) }}
    <span class="help-block">Hours</span>
    {{ $errors->first('duration_hours', '<span class="help-block">:message</span>') }}
  </div>
  <div class="col-md-3 {{ $errors->has('duration_minutes') ? 'has-error' : '' }}">
    {{ Form::text('duration_minutes', Input::get('duration_minutes'), array('class' => 'form-control')) }}
    <span class="help-block">Minutes</span>
    {{ $errors->first('duration_minutes', '<span class="help-block">:message</span>') }}
  </div>
</div>
@if($errors->has('duration'))
<div class="form-group has-error">
  <div class="col-md-offset-2 col-md-6">
    {{ $errors->first('duration', '<span class="help-block">:message</span>') }}
  </div>
</div>
@endif
<div class="form-group {{ $errors->has('notes') ? 'has-error' : '' }}">
  {{ Form::label('notes', 'Notes', array('class' => 'control-label col-md-2')) }}
  <div class="col-md-6">
    {{ Form::textarea('notes', Input::get('notes'), array('class' => 'form-control col-md-2')) }}
    {{ $errors->first('notes', '<span class="help-block">:message</span>') }}
  </div>
</div>
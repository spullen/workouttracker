<div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
  {{ Form::label('amount', 'Amount *', array('class' => 'control-label col-md-2')) }}
  <div class="col-md-6">
    {{ Form::text('amount', Input::get('amount'), array('class' => 'form-control')) }}
    {{ $errors->first('amount', '<span class="help-block">:message</span>') }}
  </div>
</div>
<div class="form-group {{ $errors->has('duration') ? 'has-error' : '' }}">
  {{ Form::label('duration', 'Duration (in minutes) *', array('class' => 'control-label col-md-2')) }}
  <div class="col-md-6">
    {{ Form::text('duration', Input::get('duration'), array('class' => 'form-control')) }}
    {{ $errors->first('duration', '<span class="help-block">:message</span>') }}
  </div>
</div>
<div class="form-group {{ $errors->has('notes') ? 'has-error' : '' }}">
  {{ Form::label('notes', 'Notes', array('class' => 'control-label col-md-2')) }}
  <div class="col-md-6">
    {{ Form::textarea('notes', Input::get('notes'), array('class' => 'form-control col-md-2')) }}
    {{ $errors->first('notes', '<span class="help-block">:message</span>') }}
  </div>
</div>
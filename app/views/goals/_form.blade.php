<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
  {{ Form::label('title', 'Title', array('class' => 'control-label col-md-2')) }}
  <div class="col-md-6">
    {{ Form::textarea('titla', $goal->title, array('class' => 'form-control col-md-2')) }}
    {{ $errors->first('title', '<span class="help-block">:message</span>') }}
  </div>
</div>
<div class="form-group {{ $errors->has('target_amount') ? 'has-error' : '' }}">
  {{ Form::label('target_amount', 'Target Amount', array('class' => 'control-label col-md-2')) }}
  <div class="col-md-6">
    {{ Form::text('target_amount', $goal->target_amount, array('class' => 'form-control')) }}
    {{ $errors->first('target_amount', '<span class="help-block">:message</span>') }}
  </div>
</div>
<div class="form-group {{ $errors->has('target_date') ? 'has-error' : '' }}">
  {{ Form::label('target_date', 'Target Date', array('class' => 'control-label col-md-2')) }}
  <div class="col-md-6">
    {{ Form::text('target_date', $goal->target_date, array('class' => 'form-control datepicker', 'data-date-format' => 'YYYY-MM-DD')) }}
    {{ $errors->first('target_date', '<span class="help-block">:message</span>') }}
  </div>
</div>
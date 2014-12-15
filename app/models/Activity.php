<?php

class Activity extends Eloquent {
	protected $fillable = array('name', 'met');
	public $timestamps = false;

  public function metrics() {
    return $this->belongsToMany('Metric', 'activity_metrics', 'activity_id', 'metric_id');
  }
}
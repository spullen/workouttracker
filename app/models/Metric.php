<?php

class Metric extends \Eloquent {
  protected $fillable = array('name');
  public $timestamps = false;

  public function activities() {
    return $this->belongsToMany('Activity', 'activity_metrics', 'metric_id', 'activity_id');
  }
}
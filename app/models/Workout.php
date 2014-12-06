<?php

class Workout extends Eloquent {
	protected $fillable = array('metric', 'amount', 'duration', 'notes');

  public function user() {
    return $this->belongsTo('User');
  }

  public function activity() {
    return $this->belongsTo('Activity');
  }

  public function metric() {
    return $this->belongsTo('Metric');
  }

  public function goals() {
    return $this->belongsToMany('Goal', 'goal_workouts', 'workout_id', 'goal_id');
  }
}
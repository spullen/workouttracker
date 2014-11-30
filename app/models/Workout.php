<?php

class Workout extends Eloquent {
	protected $fillable = array('metric', 'amount', 'start', 'duration', 'notes');

  public function user() {
    return $this->belongsTo('User');
  }

  public function activity() {
    return $this->belongsTo('Activity');
  }

  public function goals() {
    return $this->belongsToMany('Goal', 'goal_workouts', 'goal_id', 'workout_id');
  }
}
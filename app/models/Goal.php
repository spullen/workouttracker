<?php

class Goal extends Eloquent {
	protected $fillable = array('title', 'metric', 'targetAmount', 'targetDate');

  public function user() {
    return $this->belongsTo('User');
  }

  public function activity() {
    return $this->belongsTo('Activity');
  }

  public function workouts() {
    return $this->belongsToMany('Workout', 'goal_workouts', 'goal_id', 'workout_id');
  }

  public function getPercentAccomplishedAttribute() {
    $percent = (int)($this->current_amount / $this->target_amount) * 100;
    if($percent > 100) {
      $percent = 100;
    }
    return $percent;
  }
}
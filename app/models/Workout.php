<?php

class Workout extends Eloquent {
	protected $fillable = array('metric', 'amount', 'notes');
  protected $appends = array('duration_hours', 'duration_minutes');

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

  public function getDurationHoursAttribute() {
    return floor($this->duration / 60);
  }

  public function getDurationMinutesAttribute() {
    return $this->duration % 60;
  }
}
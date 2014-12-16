<?php

class Goal extends Eloquent {
	protected $fillable = array('title', 'metric', 'targetAmount', 'targetDate');

  public function user() {
    return $this->belongsTo('User');
  }

  public function activity() {
    return $this->belongsTo('Activity');
  }

  public function metric() {
    return $this->belongsTo('Metric');
  }

  public function workouts() {
    return $this->belongsToMany('Workout', 'goal_workouts', 'goal_id', 'workout_id');
  }

  public function displayTitle() {
    if(empty($this->title)) {
      return $this->activity->name . ' ' . $this->metric->name . ' - ' . $this->target_date;
    } else {
      return $this->title;
    }
  }

  public function percentAccomplished() {
    $percent = ($this->current_amount / $this->target_amount) * 100;
    if($percent > 100) {
      $percent = 100;
    }
    return round($percent, 2);
  }

  public function overdue() {
    $now = Carbon::now();
    $target = new Carbon($this->target_date);
    return $this->percentAccomplished() < 100.0 && $now->gt($target);
  }

  /*
   * Determines the accomplished state.
   *
   * If accomplished date is null and the current amount is greater or equal to 
   * the target amount then the accomplished date is set to the current date.
   *
   * If the accomplished date is not null and the current amount falls below the
   * target amount nullify the accomplished date (this is for the case when a workout or 
   * goal is edited)
   * 
   */
  public function determineAccomplishedState() {
    if(!isset($this->accomplished_date) && $this->current_amount >= $this->target_amount) {
      $this->accomplished_date = Carbon::now()->toDateString();
    } else if(isset($this->accomplished_date) && $this->current_amount < $this->target_amount) {
      $this->accomplished_date = null;
    }
  }
}
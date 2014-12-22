<?php

class NotificationPreference extends Eloquent {
  protected $fillable = array('goal_reminder', 'missed_goal_target', 'no_active_goals', 'progress_report', 'new_features', 'deals');
  
  public function user() {
    return $this->belongsTo('User');
  }
}
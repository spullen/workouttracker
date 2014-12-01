<?php
class WorkoutHelpers {
    public static function activities() {
      return array('' => 'Please select activity...') + Activity::lists('name', 'id');
    }

    public static function metrics() {
      return array('' => 'Please select metric...', 
                   'Distance' => 'Distance',
                   'Reps' => 'Reps',
                   'Count' => 'Count');
    }
}
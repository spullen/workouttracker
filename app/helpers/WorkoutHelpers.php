<?php
class WorkoutHelpers {
    public static function activities() {
      return array('' => 'Please select activity...') + Activity::lists('name', 'id');
    }

    public static function metrics($activity_id = null) {
      $metrics = array();

      if($activity_id) {
        // get a list of metrics for the activity
        $activity = Activity::find($activity_id);
        $metrics += array('' => 'Please select metric...');
        $metrics += $activity->metrics->lists('name', 'id');
      } else {
        $metrics = array('' => 'Please select activity...');
      }

      return $metrics;
    }
}
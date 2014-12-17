<?php
class WorkoutHelpers {
    public static function activities() {
      return array('' => trans('messages.activity.select')) + Activity::lists('name', 'id');
    }

    public static function metrics($activity_id = null) {
      $metrics = array();

      if($activity_id) {
        // get a list of metrics for the activity
        $activity = Activity::find($activity_id);
        $metrics += array('' => trans('messages.metric.select'));
        $metrics += $activity->metrics->lists('name', 'id');
      } else {
        $metrics = array('' => trans('messages.activity.select'));
      }

      return $metrics;
    }
}
<?php

class ActivityMetricsController extends \BaseController {
  
  public function index($id = null) {
    $metrics = WorkoutHelpers::metrics($id);
    return Response::json($metrics)->setTtl(40320); // cache for 4 weeks
  }

}
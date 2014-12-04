<?php

class DashboardController extends \BaseController {

  public function index() {
    $user = Auth::user();
    $activeGoals = $user->activeGoals();
    $recentlyAccomplishedGoals = $user->recentlyAccomplishedGoals();
    $recentlyLoggedWorkouts = $user->recentlyLoggedWorkouts();

    return View::make('dashboard')
              ->with('activeGoals', $activeGoals)
              ->with('recentlyAccomplishedGoals', $recentlyAccomplishedGoals)
              ->with('recentlyLoggedWorkouts', $recentlyLoggedWorkouts);
  }

}
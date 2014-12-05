<?php

class WorkoutDestroyService {

  private $workout;

  public function __construct($workout) {
    $this->workout = $workout;
  }

  public function perform() {
    $workout = $this->workout;

    // remove the amount from all of the goals
    $goals = $workout->goals()->get();

    // update each goal (remove the deleted workout's amount)
    foreach($goals as $goal) {
      $goal->current_amount -= $workout->amount;
      $goal->determineAccomplishedState();
      $goal->save();

      // detach from workout (the cascase delete should get this, but for good measure)
      $goal->workouts()->detach($workout->id);
    }

    $workout->delete();
  }
}
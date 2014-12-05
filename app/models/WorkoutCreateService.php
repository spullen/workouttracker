<?php

class WorkoutCreateService {

  private $user;
  private $workout;
  private $data;
  private $validator;

  public function __construct($user, $data) {
    $this->user = $user;
    $this->data = $data;
    $this->workout = new Workout($data);
    $this->validator = Validator::make($data, array(
      'activity_id' => array('required', 'numeric', 'exists:activities,id'),
      'metric' => array('required', 'in:Distance,Reps,Count'),
      'amount' => array('required', 'numeric', 'min:0.01'),
      'duration' => array('required', 'numeric', 'min:0.01')
    ));
  }

  public function workout() {
    return $this->workout;
  }

  public function valid() {
    return !$this->validator->fails();
  }

  public function save() {
    $workout = $this->workout;
    $data = $this->data;

    $workout->user()->associate($this->user);
    $workout->activity_id = $data['activity_id'];
    $workout->metric = $data['metric'];
    $workout->amount = $data['amount'];
    $workout->duration = $data['duration'];
    $workout->notes = $data['notes'];
    $workout->save();

    // find all active goals for user with activity and metric
    $goals = $this->user->goals()
                        ->where('activity_id', '=', $workout->activity_id)
                        ->where('metric', '=', $workout->metric)
                        ->whereNull('accomplished_date')
                        ->get();

    foreach($goals as $goal) {
      // create the goal_workouts entry
      $goal->workouts()->attach($workout->id);

      // update the current amount and determine the accomplished state of the goal
      $goal->current_amount += $workout->amount;
      $goal->determineAccomplishedState();
      $goal->save();
    }
  }

  public function errors() {
    return $this->validator;
  }
}
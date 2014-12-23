<?php

class WorkoutUpdateService {

  private $workout;
  private $data;
  private $validator;

  public function __construct($workout, $data) {
    $this->workout = $workout;
    $this->data = $data;
    $this->validator = Validator::make($data, array(
      'amount' => array('required', 'numeric', 'min:0.01'),
      'duration_hours' => array('numeric', 'min:0'),
      'duration_minutes' => array('required', 'numeric', 'min:0', 'max:59')
    ));

    $this->validator->sometimes('duration_hours', array('required', 'numeric', 'min:1'), function($input) {
      return $input->duration_minutes == 0;
    });
  }

  public function workout() {
    return $this->workout;
  }

  public function valid() {
    return !$this->validator->fails();
  }

  public function perform() {
    $workout = $this->workout;
    $data = $this->data;

    $activity = Activity::find($data['activity_id']);

    $duration = $data['duration_minutes'];
    if(!empty($data['duration_hours'])) {
      $duration += $data['duration_hours'] * 60;
    }

    $workout->amount = $data['amount'];
    $workout->duration = $duration;
    $workout->notes = $data['notes'];

    if($workout->isDirty('amount')) {
      // re-calculate the calories burned
      
      
      $originalAmount = $workout->getOriginal('amount');
      $goals = $workout->goals()->get();

      foreach($goals as $goal) {
        $goal->current_amount -= $originalAmount;
        $goal->current_amount += $workout->amount;
        $goal->determineAccomplishedState();
        $goal->save();    
      }
    }
    
    $workout->save();
  }

  public function errors() {
    return $this->validator;
  }

}
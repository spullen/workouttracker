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

    $duration = $data['duration_minutes'];
    if(!empty($data['duration_hours'])) {
      $duration += $data['duration_hours'] * 60;
    }

    $workout->amount = $data['amount'];
    $workout->duration = $duration;
    $workout->notes = $data['notes'];

    if($workout->isDirty('amount')) {
      $originalAmount = $workout->getOriginal('amount');
      $goals = $workout->goals()->get();

      foreach($goals as $goal) {
        $goal->current_amount -= $originalAmount;
        $goal->current_amount += $workout->amount;
        $goal->determineAccomplishedState();
        $goal->save();    
      }
    }

    // re-calculate the calories burned if duration changed
    if($workout->isDirty('duration')) {
      $met = $workout->activity->met;
      $weight_amount = $workout->user->weight_amount_kg;
      $workout->calories = ($weight_amount * $met) * ($duration / 60);
    }
    
    $workout->save();
  }

  public function errors() {
    return $this->validator;
  }

}
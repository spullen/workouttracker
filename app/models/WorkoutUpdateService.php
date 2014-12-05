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
      'duration' => array('required', 'numeric', 'min:0.01')
    ));
  }

  public function workout() {
    return $this->workout;
  }

  public function valid() {
    return !$this->validator->fails();
  }

  public function update() {
    $workout = $this->workout;
    $data = $this->data;

    $workout->amount = $data['amount'];
    $workout->duration = $data['duration'];
    $workout->notes = $data['notes'];

    // update the workout's goals' current amount if the amount has changed
    if($workout->isDirty('amount')) {
      $originalAmount = $workout->getOriginal('amount');

      $goals = $workout->goals()->get();

      // update all of the workout's goals for the new value
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
<?php

class GoalUpdateService {

  private $goal;
  private $data;
  private $validator;

  public function __construct($goal, $data) {
    $this->goal = $goal;
    $this->data = $data;
    $this->validator = Validator::make($data, array(
      'title' => array('required'),
      'target_amount' => array('required', 'numeric', 'min:0.01'),
      'target_date' => array('required', 'regex:/\d{4}-\d{1,2}-\d{1,2}/', 'date_format:Y-m-d', 'after:' . Carbon::yesterday('US/Eastern')->toDateString())
    ));
  }

  public function goal() {
    return $this->goal;
  }

  public function valid() {
    return !$this->validator->fails();
  }

  public function perform() {
    $goal = $this->goal;
    $data = $this->data;
    
    $goal->title = $data['title'];
    $goal->target_amount = $data['target_amount'];
    $goal->target_date = $data['target_date'];

    // determine if the goal's accomplished state has changed
    $goal->determineAccomplishedState();

    $goal->save();
  }

  public function errors() {
    return $this->validator;
  }
}
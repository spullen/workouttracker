<?php

class GoalCreateService {

  private $user;
  private $goal;
  private $data;
  private $validator;

  public function __construct($user, $data) {
    $this->user = $user;
    $this->data = $data;
    $this->goal = new Goal($data);
    $this->validator = Validator::make($data, array(
      'activity_id' => array('required', 'numeric', 'exists:activities,id'),
      'metric_id' => array('required', 'numeric', 'exists:metrics,id'),
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

    $goal->user()->associate($this->user);

    $goal->title = trim($data['title']);
    $goal->activity_id = $data['activity_id'];
    $goal->metric_id = $data['metric_id'];
    $goal->target_amount = $data['target_amount'];
    $goal->target_date = $data['target_date'];
    $goal->save();
  }

  public function errors() {
    return $this->validator;
  }
}
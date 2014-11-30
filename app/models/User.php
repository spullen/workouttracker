<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {
	use UserTrait, RemindableTrait;

	protected $table = 'users';

	protected $hidden = array('password', 'remember_token');

	public function workouts() {
		return $this->hasMany('Workout');
	}

  public function goals() {
    return $this->hasMany('Goal');
  }

	public function getNameAttribute() {
		return $this->first_name . ' ' . $this->last_name;
	}
}

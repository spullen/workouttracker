<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {
	use UserTrait, RemindableTrait;

	protected $table = 'users';

	protected $hidden = array('password', 'remember_token');

  public function userSetting() {
    return $this->hasOne('UserSetting');
  }

  public function notificationPreference() {
    return $this->hasOne('NotificationPreference');
  }

  public function weights() {
    return $this->hasMany('Weight');
  }

  public function weight() {
    return $this->weights()->orderBy('created_at', 'desc')->first();
  }

	public function workouts() {
		return $this->hasMany('Workout');
	}

  public function goals() {
    return $this->hasMany('Goal');
  }

  public function activeGoals() {
    return $this->goals()
                ->with('activity')
                ->whereNull('accomplished_date')
                ->orderBy('target_date', 'asc')
                ->get();
  }

  public function getWeightUnitAttribute() {
    return $this->userSetting->weight_unit;
  }

  public function getDistanceUnitAttribute() {
    return $this->userSetting->distance_unit;
  }

  public function recentlyAccomplishedGoals() {
    $now = Carbon::now();
    $startWeek = $now->subWeek()->toDateString();
    $endWeek = $now->tomorrow()->toDateString();
    return $this->goals()
                ->with('activity')
                ->whereNotNull('accomplished_date')
                ->whereBetween('accomplished_date', array($startWeek, $endWeek))
                ->orderBy('accomplished_date', 'desc')
                ->get();
  }

  public function recentlyLoggedWorkouts() {
    return $this->workouts()
                ->with('activity')
                ->orderBy('created_at', 'desc')
                ->take(25)
                ->get();
  }

	public function getNameAttribute() {
		return $this->first_name . ' ' . $this->last_name;
	}
}

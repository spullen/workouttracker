<?php

class UserSetting extends Eloquent {
  protected $fillable = array('timezone', 'language', 'distance_unit', 'weight_unit');
  
  public function user() {
    return $this->belongsTo('User');
  }
}
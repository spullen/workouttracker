<?php

class UserSetting extends Eloquent {
  
  public function user() {
    return $this->belongsTo('User');
  }
}
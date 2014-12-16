<?php

class Weight extends Eloquent {
  protected $fillable = array('amount');

  public function user() {
    return $this->belongsTo('User');
  }
}
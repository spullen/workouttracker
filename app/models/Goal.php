<?php

class Goal extends Eloquent {
	protected $fillable = array('title', 'metric', 'targetAmount', 'targetDate');
}
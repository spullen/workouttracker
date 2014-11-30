<?php

class Workout extends Eloquent {
	protected $fillable = array('metric', 'amount', 'start', 'duration', 'notes');
}
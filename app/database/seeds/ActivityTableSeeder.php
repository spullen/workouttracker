<?php

class ActivityTableSeeder extends Seeder {

	public function run() {
		Activity::firstOrCreate(array('name' => 'Running'));
		Activity::firstOrCreate(array('name' => 'Cycling'));
		Activity::firstOrCreate(array('name' => 'Walking'));
		Activity::firstOrCreate(array('name' => 'Push Ups'));
		Activity::firstOrCreate(array('name' => 'Pull Ups'));
		Activity::firstOrCreate(array('name' => 'Sit Ups'));
		Activity::firstOrCreate(array('name' => 'Crunches'));
		Activity::firstOrCreate(array('name' => 'Weight Lifting'));
	}

}
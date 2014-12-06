<?php

class ActivityTableSeeder extends Seeder {

	public function run() {
		// metrics
		$distance = Metric::firstOrCreate(array('name' => 'Distance'));
		$steps = Metric::firstOrCreate(array('name' => 'Steps'));
		$reps = Metric::firstOrCreate(array('name' => 'Reps'));
		$count = Metric::firstOrCreate(array('name' => 'Count'));

		// activities
		$running = Activity::firstOrCreate(array('name' => 'Running'));
		$running->metrics()->attach($distance);

		$cycling = Activity::firstOrCreate(array('name' => 'Cycling'));
		$cycling->metrics()->attach($distance);

		$walking = Activity::firstOrCreate(array('name' => 'Walking'));
		$walking->metrics()->attach($distance);
		$walking->metrics()->attach($steps);

		$hiking = Activity::firstOrCreate(array('name' => 'Hiking'));
		$hiking->metrics()->attach($distance);

		$push_ups = Activity::firstOrCreate(array('name' => 'Push Ups'));
		$push_ups->metrics()->attach($count);

		$pull_ups = Activity::firstOrCreate(array('name' => 'Pull Ups'));
		$pull_ups->metrics()->attach($count);

		$sit_ups = Activity::firstOrCreate(array('name' => 'Sit Ups'));
		$sit_ups->metrics()->attach($count);

		$crunches = Activity::firstOrCreate(array('name' => 'Crunches'));
		$crunches->metrics()->attach($count);

		$lifting = Activity::firstOrCreate(array('name' => 'Weight Lifting'));
		$lifting->metrics()->attach($count);
		$lifting->metrics()->attach($reps);
	}

}
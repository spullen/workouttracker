<?php

class ActivityTableSeeder extends Seeder {

	public function run() {
		// metrics
		$distance = Metric::firstOrCreate(array('name' => 'Distance'));
		$steps = Metric::firstOrCreate(array('name' => 'Steps'));
		$reps = Metric::firstOrCreate(array('name' => 'Reps'));
		$count = Metric::firstOrCreate(array('name' => 'Count'));
		$laps = Metric::firstOrCreate(array('name' => 'laps'));
		$yards = Metric::firstOrCreate(array('name' => 'yards'));

		// activities
		$running = Activity::firstOrCreate(array('name' => 'Running', 'met' => 7.0));
		$running->metrics()->attach($distance);

		$cycling = Activity::firstOrCreate(array('name' => 'Cycling', 'met' => 8.0));
		$cycling->metrics()->attach($distance);

		$walking = Activity::firstOrCreate(array('name' => 'Walking', 'met' => 3.5));
		$walking->metrics()->attach($distance);
		$walking->metrics()->attach($steps);

		$hiking = Activity::firstOrCreate(array('name' => 'Hiking', 'met' => 6.0));
		$hiking->metrics()->attach($distance);

		$push_ups = Activity::firstOrCreate(array('name' => 'Push Ups', 'met' => 8.0));
		$push_ups->metrics()->attach($count);

		$pull_ups = Activity::firstOrCreate(array('name' => 'Pull Ups', 'met' => 8.0));
		$pull_ups->metrics()->attach($count);

		$sit_ups = Activity::firstOrCreate(array('name' => 'Sit Ups', 'met' => 8.0));
		$sit_ups->metrics()->attach($count);

		$crunches = Activity::firstOrCreate(array('name' => 'Crunches', 'met' => 8.0));
		$crunches->metrics()->attach($count);

		$lifting = Activity::firstOrCreate(array('name' => 'Weight Lifting', 'met' => 6.0));
		$lifting->metrics()->attach($count);
		$lifting->metrics()->attach($reps);

		$swimming = Activity::firstOrCreate(array('name' => 'Swimming', 'met' => 7.0));
		$swimming->metrics()->attach($laps);
		$swimming->metrics()->attach($yards);
	}

}
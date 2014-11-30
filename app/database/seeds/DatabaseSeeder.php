<?php

class DatabaseSeeder extends Seeder {

	public function run() {
		$this->call('ActivityTableSeeder');
		$this->command->info('Activity table seeded!');
	}

}

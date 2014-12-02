<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveStartFromWorkout extends Migration {

	public function up() {
		Schema::table('workouts', function($table) {
			$table->dropColumn('start');
		});
	}

	public function down() {
		Schema::table('workouts', function($table) {
			$table->dateTime('start');
		});
	}

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCaloriesToWorkout extends Migration {

	public function up() {
		Schema::table('workouts', function($table) {
			$table->decimal('calories', 10, 2)->nullable();
		});
	}

	public function down() {
		Schema::table('workouts', function($table) {
			$table->dropColumn('calories');
		});
	}

}

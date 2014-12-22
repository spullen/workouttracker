<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDistanceUnitColumnToWorkoutsAndGoals extends Migration {

	public function up() {
		Schema::table('goals', function($table) {
			$table->char('distance_unit', 2)->nullable();
		});

		Schema::table('workouts', function($table) {
			$table->char('distance_unit', 2)->nullable();
		});
	}

	public function down() {
		Schema::table('goals', function($table) {
			$table->dropColumn('distance_unit');
		});

		Schema::table('workouts', function($table) {
			$table->dropColumn('distance_unit');
		});
	}

}

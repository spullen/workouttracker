<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDurationColumnType extends Migration {

	public function up() {
		Schema::table('workouts', function($table) {
			$table->dropColumn('duration');
		});

		Schema::table('workouts', function($table) {
			$table->integer('duration')->unsigned();
		});
	}

	public function down() {
		Schema::table('workouts', function($table) {
			$table->dropColumn('duration');
		});

		Schema::table('workouts', function($table) {
			$table->decimal('duration', 6, 2)->default(0.01);
		});
	}

}

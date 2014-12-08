<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoalWorkouts extends Migration {

	public function up() {
		Schema::create('goal_workouts', function($table) {
			$table->integer('goal_id')->unsigned();
			$table->foreign('goal_id')->references('id')->on('goals')->onDelete('cascade');
			$table->integer('workout_id')->unsigned();
			$table->foreign('workout_id')->references('id')->on('workouts')->onDelete('cascade');
		});
	}

	public function down() {
		Schema::drop('goal_workouts');
	}

}

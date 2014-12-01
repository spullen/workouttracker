<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkouts extends Migration {

	public function up() {
		Schema::create('workouts', function($table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users')->on_delete('cascade');
			$table->integer('activity_id')->unsigned();
			$table->foreign('activity_id')->references('id')->on('activities');
			$table->string('metric');
			$table->decimal('amount', 6, 2)->default(0.01);
			$table->dateTime('start');
			$table->decimal('duration', 6, 2)->default(0.01);
			$table->text('notes')->nullable();
			$table->timestamps();
		});
	}

	public function down() {
		Schema::drop('workouts');
	}

}

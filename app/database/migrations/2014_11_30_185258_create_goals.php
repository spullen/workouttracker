<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoals extends Migration {

	public function up() {
		Schema::create('goals', function($table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->integer('activity_id')->unsigned();
			$table->foreign('activity_id')->references('id')->on('activities');
			$table->string('title');
			$table->string('metric');
			$table->decimal('targetAmount', 6, 2)->default(0.01);
			$table->date('targetDate');
			$table->decimal('currentAmount', 6, 2)->default(0.0);
			$table->date('accomplishedDate')->nullable();
			$table->timestamps();
		});
	}

	public function down() {
		Schema::drop('goals');
	}

}

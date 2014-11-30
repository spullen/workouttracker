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
			$table->decimal('target_amount', 6, 2)->default(0.01);
			$table->date('target_date');
			$table->decimal('current_amount', 6, 2)->default(0.0);
			$table->date('accomplished_date')->nullable();
			$table->timestamps();
		});
	
		Schema::table('goals', function($table) {
			$table->index(array('user_id', 'activity_id', 'metric'));
		});
	}

	public function down() {
		Schema::table('goals', function($table) {
			$table->dropIndex('goals_user_id_activity_id_metric_index');
		});

		Schema::drop('goals');
	}

}

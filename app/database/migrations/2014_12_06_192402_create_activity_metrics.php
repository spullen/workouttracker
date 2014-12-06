<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityMetrics extends Migration {

	public function up() {
		Schema::create('activity_metrics', function($table) {
			$table->integer('activity_id')->unsigned();
			$table->foreign('activity_id')->references('id')->on('activities');
			$table->integer('metric_id')->unsigned();
			$table->foreign('metric_id')->references('id')->on('metrics');
		});
	}

	public function down() {
		Schema::drop('activity_metrics');
	}
}
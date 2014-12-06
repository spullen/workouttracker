<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeGoalMetricToMetricId extends Migration {

	public function up() {
		Schema::table('goals', function($table) {
			$table->dropColumn('metric');
			$table->integer('metric_id')->unsigned();
			$table->foreign('metric_id')->references('id')->on('metrics');
		});
	}

	public function down() {
		Schema::table('goals', function($table) {
			$table->dropColumn('metric_id');
			$table->string('metric');
		});
	}

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetrics extends Migration {

	public function up() {
		Schema::create('metrics', function($table) {
			$table->increments('id');
			$table->string('name');
		});
	}

	public function down() {
		Schema::drop('metrics');
	}

}

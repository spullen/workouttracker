<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivities extends Migration {

	public function up() {
		Schema::create('activities', function($table) {
			$table->increments('id');
			$table->string('name');
		});
	}

	public function down() {
		Schema::drop('activities');
	}

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSettingsTable extends Migration {

	public function up() {
		Schema::create('user_settings', function($table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned()->unique();;
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->string('timezone');
			$table->string('language', 2)->default('en');
			$table->char('distance_unit', 2)->default('mi');
			$table->char('weight_unit', 2)->default('lb');
			$table->timestamps();
		});
	}

	public function down() {
		Schema::drop('user_settings');
	}

}

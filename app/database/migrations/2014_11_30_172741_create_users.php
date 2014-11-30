<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {


	public function up() {
		Schema::create('users', function($table) {
			$table->increments('id');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('email');
			$table->string('password', 60);
			$table->rememberToken();
			$table->boolean('is_admin')->default(false);
			$table->timestamps();
		});

		Schema::table('users', function($table) {
			$table->unique('email');
		});
	}

	public function down() {
		Schema::table('users', function($table) {
			$table->dropUnique('users_email_unique');
		});

		Schema::drop('users');
	}

}

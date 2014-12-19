<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSexToUsersTable extends Migration {

	public function up() {
		Schema::table('users', function($table) {
			$table->char('sex', 1);
		});
	}

	public function down() {
		Schema::table('users', function($table) {
			$table->dropColumn('sex');
		});
	}

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBirthdateToUsers extends Migration {

	public function up() {
		Schema::table('users', function($table) {
			$table->date('birthdate');
		});
	}

	public function down() {
		Schema::table('users', function($table) {
			$table->dropColumn('birthdate');
		});
	}

}

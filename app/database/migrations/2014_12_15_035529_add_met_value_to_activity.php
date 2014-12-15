<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMetValueToActivity extends Migration {

	public function up() {
		Schema::table('activities', function($table) {
			$table->decimal('met', 4, 2)->default(0.0);
		});
	}

	public function down() {
		Schema::table('activities', function($table) {
			$table->dropColumn('met');
		});
	}

}

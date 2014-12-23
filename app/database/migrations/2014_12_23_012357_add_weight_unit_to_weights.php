<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWeightUnitToWeights extends Migration {

	public function up() {
		Schema::table('weights', function($table) {
			$table->char('weight_unit', 2);
		});
	}

	public function down() {
		Schema::table('weights', function($table) {
			$table->dropColumn('weight_unit');
		});
	}

}

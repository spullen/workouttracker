<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangePrecisionAndScaleOfAmountOnWorkouts extends Migration {

	public function up() {
	  DB::statement('ALTER TABLE `workouts` MODIFY `amount` decimal(20, 2) NOT NULL;');
	}

	public function down() {
    DB::statement('ALTER TABLE `workouts` MODIFY `amount` decimal(6, 2) NOT NULL;');
	}

}

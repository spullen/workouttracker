<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangePrecisionAndScaleOfTargetAmountAndCurrentAmountOnGoals extends Migration {

	public function up() {
		DB::statement('ALTER TABLE `goals` MODIFY `target_amount` decimal(20, 2) NOT NULL;');
		DB::statement('ALTER TABLE `goals` MODIFY `current_amount` decimal(20, 2) NOT NULL;');
	}

	public function down() {
		DB::statement('ALTER TABLE `goals` MODIFY `target_amount` decimal(6, 2) NOT NULL;');
		DB::statement('ALTER TABLE `goals` MODIFY `current_amount` decimal(6, 2) NOT NULL;');
	}

}

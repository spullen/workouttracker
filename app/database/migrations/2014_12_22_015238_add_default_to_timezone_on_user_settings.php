<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDefaultToTimezoneOnUserSettings extends Migration {

	public function up() {
		DB::statement("ALTER TABLE `user_settings` CHANGE COLUMN `timezone` `timezone` varchar(255) NOT NULL DEFAULT 'US/Eastern';");
	}

	public function down() {
		DB::statement("ALTER TABLE `user_settings` CHANGE COLUMN `timezone` `timezone` varchar(255) NOT NULL DEFAULT '';");
	}

}

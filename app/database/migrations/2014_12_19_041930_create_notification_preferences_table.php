<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationPreferencesTable extends Migration {

	public function up() {
		Schema::create('notification_preferences', function($table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned()->unique();;
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->boolean('goal_reminder')->default(true);
			$table->boolean('missed_goal_target')->default(true);
			$table->boolean('no_active_goals')->default(true);
			$table->dateTime('no_active_goals_last_sent')->nullable();
			$table->boolean('progress_report')->default(true);
			$table->boolean('new_features')->default(true);
			$table->boolean('deals')->default(true);
			$table->timestamps();
		});
	}

	public function down() {
		Schema::drop('notification_preferences');
	}

}

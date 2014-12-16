<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeightsTable extends Migration {

	public function up() {
		Schema::create('weights', function($table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->decimal('amount', 4, 1)->default(0.1);
			$table->timestamps();
		});
	}

	public function down() {
		Schema::drop('weights');
	}

}

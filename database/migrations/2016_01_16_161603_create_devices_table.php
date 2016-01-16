<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDevicesTable extends Migration {

	public function up()
	{
		Schema::create('devices', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('MAC', 20);
			$table->string('Name')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('devices');
	}
}
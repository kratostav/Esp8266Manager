<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('values', function(Blueprint $table) {
			$table->foreign('did')->references('id')->on('devices')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('values', function(Blueprint $table) {
			$table->dropForeign('values_did_foreign');
		});

	}
}
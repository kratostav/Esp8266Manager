<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateValuesTable extends Migration
{

    public function up()
    {
        Schema::create('values', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->decimal('temperature', 10, 2)->nullable();
            $table->integer('humidity')->nullable();
            $table->integer('did')->unsigned();
        });
    }

    public function down()
    {
        Schema::drop('values');
    }
}
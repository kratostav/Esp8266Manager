<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccumulationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valuesAcc', function (Blueprint $table) {
            $table->increments('id');

            $table->decimal('minTemp', 10, 2)->nullable();
            $table->decimal('maxTemp', 10, 2)->nullable();
            $table->decimal('avgTemp', 10, 2)->nullable();

            $table->decimal('minHum', 10, 2)->nullable();
            $table->decimal('maxHum', 10, 2)->nullable();
            $table->decimal('avgHum', 10, 2)->nullable();

            $table->dateTime('lastEntry')->nullable();
            $table->date('date')->nullable();

            $table->integer('did')->unsigned();
            $table->integer('count')->unsingned();

            $table->timestamps();

            $table->foreign('did')->references('id')->on('devices')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unique(array('did', 'date'));
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

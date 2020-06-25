<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('operator_name');
            $table->string('bus_model');
            $table->string('has_ac');
            $table->string('departure_address');
            $table->string('arrival_address');
            $table->dateTime('departure_time_date');
            $table->dateTime('arrival_time_date');
            $table->string('class');
            $table->integer('fare');
            $table->integer('no_of_seat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bus_details');
    }
}

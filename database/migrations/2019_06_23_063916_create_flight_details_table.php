<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flight_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('flight_name');
            $table->string('flight_number');
            $table->string('departure_airport');
            $table->string('arrival_airport');
            $table->dateTime('departure_time_date');
            $table->dateTime('arrival_time_date');
            $table->string('check_in_baggage');
            $table->string('cabin_baggage');
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
        Schema::dropIfExists('flight_details');
    }
}

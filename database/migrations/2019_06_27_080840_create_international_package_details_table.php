<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternationalPackageDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('international_package_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->integer('days');
            $table->integer('price');
            $table->date('available_from')->nullable('true');
            $table->date('available_to')->nullable('true');
            $table->string('where');
            $table->text('description')->nullable('true');
            $table->string('image');
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
        Schema::dropIfExists('international_package_details');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_configurations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->string('logo');
            $table->string('address');
            $table->string('phone_number1');
            $table->string('phone_number2')->nullable($value = true);
            $table->string('email');
            $table->string('facebook')->nullable($value = true);
            $table->string('google_map')->nullable($value = true);
            $table->text('about_us');
            $table->string('short_about_us');
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
        Schema::dropIfExists('company_configurations');
    }
}

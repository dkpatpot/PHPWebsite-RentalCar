<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_offers', function (Blueprint $table) {
            $table->id();
            $table->string('cus_firstname');
            $table->string('cus_lastname');
            $table->string('cus_email');
            $table->string('cus_phone');
            $table->string('car_brand');
            $table->string('car_model');
            $table->string('car_year');
            $table->string('car_color');
            $table->string('car_mileage');
            $table->string('offer_status')->default('pending');

            $table->string('car_total_displacement')->nullable()->default(null);
            $table->string('car_fuel_type')->nullable()->default(null);
            $table->string('car_drive_system')->nullable()->default(null);
            $table->string('car_transmission')->nullable()->default(null);
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
        Schema::dropIfExists('car_offers');
    }
};

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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('car_code')->default(1);
            $table->string('brand');
            $table->string('years');
            $table->string('model');
            $table->string('color');
            $table->string('total_displacement');
            $table->string('mileage');
            $table->string('fuel_type');
            $table->string('drive_system');
            $table->string('transmission'); 
            $table->bigInteger('price');
            $table->string('status')->default('available');
            $table->bigInteger('view_count')->default(0);
            $table->bigInteger('like_count')->default(0);
            $table->string('type');
            
            $table->double('interest')->default(0);
            $table->bigInteger('down_payment')->default(0);
            $table->double('monthly_payment')->default(0);
            $table->bigInteger('pay_period')->default(1);

            $table->string('buy_by')->nullable()->default(null);

            $table->string('p_code')->nullable()->default(null);
            $table->double('p_discount')->nullable()->default(null);
            $table->double('price_with_vat')->nullable()->default(null);
            $table->double('total_price')->nullable()->default(null);

 
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
        Schema::dropIfExists('car');
    }
};

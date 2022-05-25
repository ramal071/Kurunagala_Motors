<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users');
            // $table->unsignedBigInteger('bike_id');
            // $table->foreign('bike_id')->references('id')->on('bikes');
            // $table->unsignedBigInteger('brand_id');
            // $table->foreign('brand_id')->references('id')->on('brands');
            // $table->string('register_number',10);
            // $table->boolean('status')->default(1);
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
        Schema::dropIfExists('customer_vehicles');
    }
}

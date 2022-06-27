<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceServiceRepairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_service_repairs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('service_repair_id');
            $table->foreign('service_repair_id')->references('id')->on('service_repairs');
            $table->unsignedBigInteger('service_id'); 
            $table->foreign('service_id')->references('id')->on('services');
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
        Schema::dropIfExists('service_service_repairs');
    }
}

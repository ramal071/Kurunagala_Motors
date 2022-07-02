<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceRepairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_repairs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');                 
            $table->unsignedBigInteger('customervehicle_id');
            $table->foreign('customervehicle_id')->references('id')->on('customer_vehicles');
            $table->string('email')->nullable();
            $table->decimal('amount', $precision = 8, $scale = 2)->nullable();
            $table->boolean('is_repaircomplete')->default(false);
            $table->boolean('is_borrow')->default(false);   
            $table->decimal('paid_amount', $precision = 8, $scale = 2)->nullable(); //borrowed with some amount paid
            $table->boolean('is_complete')->default(false); //if full payment ok
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('service_repairs');
    }
}

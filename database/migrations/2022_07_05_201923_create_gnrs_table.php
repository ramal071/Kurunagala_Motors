<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGnrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gnrs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('gnrcode');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->string('supplier_name')->nullable();
            $table->string('contact')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('date')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('gnrs');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGnrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gnr', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date')->nullable();  
            $table->string('supplier')->nullable();  
            $table->string('address')->nullable();  
            $table->string('code')->nullable();  
            $table->string('contact')->nullable();  
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
        Schema::dropIfExists('gnr');
    }
}

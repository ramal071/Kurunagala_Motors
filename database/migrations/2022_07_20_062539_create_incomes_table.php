<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->decimal('dealerprice')->nullable();
            $table->decimal('sellingprice')->nullable();   
            $table->decimal('charge')->nullable();
            $table->decimal('fixprice')->nullable();  
            $table->decimal('price')->nullable(); 
            $table->decimal('total_income')->nullable(); 
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
        Schema::dropIfExists('incomes');
    }
}

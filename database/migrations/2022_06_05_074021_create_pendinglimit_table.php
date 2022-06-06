<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendinglimitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendinglimit', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->nullable();  
            $table->string('name')->nullable();  
            $table->string('limit')->nullable();  
            $table->string('availableqty')->nullable();  
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
        Schema::dropIfExists('pendinglimit');
    }
}

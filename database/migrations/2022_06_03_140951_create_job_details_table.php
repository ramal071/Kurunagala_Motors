<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('amount', $precision = 8, $scale = 2);
            $table->boolean('is_repaircomplete')->default(false);
            $table->boolean('is_borrow')->default(false);   
            $table->decimal('paid_amount', $precision = 8, $scale = 2)->nullable(); //borrowed with some amount paid
            $table->boolean('is_complete')->default(false); //if full payment ok
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
        Schema::dropIfExists('job_details');
    }
}

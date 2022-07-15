<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->bigIncrements('id');  
            $table->string('slip_id');
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->unsignedBigInteger('attendance_id');
            $table->foreign('attendance_id')->references('id')->on('attendances')->onDelete('cascade');;
            $table->string('salary')->nullable();
            $table->string('basic')->nullable();
            $table->string('conveyance')->nullable();
            $table->string('allowance')->nullable();
            $table->string('medical_allowance')->nullable();
            $table->string('leave')->nullable();
            $table->string('labour_welfare')->nullable();
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
        Schema::dropIfExists('salaries');
    }
}

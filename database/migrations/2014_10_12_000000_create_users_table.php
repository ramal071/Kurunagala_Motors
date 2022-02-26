<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fname',50);
            $table->string('lname',50);
            $table->string('email')->unique();
            $table->string('role', 191)->default('user');
            $table->string('contact')->nullable();
            $table->json('notification_preference');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',191);
            $table->string('facebook_id')->nullable();
            $table->string('google_id')->nullable();
            $table->boolean('status')->default(1);
            $table->rememberToken();
            
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
        Schema::dropIfExists('users');
    }
}

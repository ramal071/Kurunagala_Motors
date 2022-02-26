<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('project_title');
            $table->string('default_address');
            $table->integer('default_phone');
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('footer_logo')->nullable();
            $table->string('logo_type')->default("T");
            $table->string('meta_data_desc', 191)->nullable();
			$table->string('meta_data_keyword', 191)->nullable();
            $table->boolean('fb_login_enable')->default('1');
			$table->boolean('google_login_enable')->default(true);
            $table->boolean('instructor_enable')->default(true);
            $table->boolean('w_email_enable')->default(0);
            $table->boolean('verify_enable')->default(0);	
            $table->boolean('captcha_enable')->default(0);
            $table->boolean('rightclick')->default(true);
            $table->boolean('inspect')->default(true);
            $table->boolean('promo_enable')->default(true);
            $table->boolean('cat_enable')->default(false);
            $table->boolean('preloader_enable')->default(false);
            $table->boolean('appointment_enable')->default(true);
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
        Schema::dropIfExists('settings');
    }
}

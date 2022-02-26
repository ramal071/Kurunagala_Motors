<?php

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'project_title' => 'Kurunagala motors',
                'logo' => 'logo.png',
                'favicon' => 'favicon.png',
                'default_address'=>'defalt address',
                'default_phone'=>'123456789',
                'meta_data_desc' => NULL,
                'meta_data_keyword' => NULL,
                'fb_login_enable' => 1,
                'google_login_enable' => 1,
                'w_email_enable' => 0,
                'verify_enable' => 0,
                'instructor_enable' => 1,
                'captcha_enable' =>0,
                'created_at' => Carbon\Carbon::now(),
                'updated_at' =>Carbon\Carbon::now(),
            ),
        ));
    }
}

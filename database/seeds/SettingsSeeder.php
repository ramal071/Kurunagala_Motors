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
                'project_title' => 'Kurunagala Motor',
                'logo' => 'logo.png',                  
                'created_at' => Carbon\Carbon::now(),
                'updated_at' =>Carbon\Carbon::now(),
            ),
        ));
    }
}

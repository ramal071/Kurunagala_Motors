<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SettingsSeeder::class);        
        $this->call(BrandSeeder::class);
        $this->call(BikeSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UsersSeeder::class);
         $this->call(UsersRolesSeeder::class);
    }
}

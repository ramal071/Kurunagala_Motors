<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->insert([
            [
                'name' => 'Manager',
                'slug' => 'manager',
                'status' => '1'
            ],

            [
                'name' => 'Cashier',
                'slug' => 'cashier',
                'status' => '1'
            ],

            [
                'name' => 'Customer',
                'slug' => 'customer',
                'status' => '1'
            ],

            [
                'name' => 'Technician',
                'slug' => 'technician',
                'status' => '1'
            ],

            [
                'name' => 'Trainee',
                'slug' => 'trainee',
                'status' => '1'
            ],
        ]);
    }
}

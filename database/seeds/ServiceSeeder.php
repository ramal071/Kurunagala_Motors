<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //code	name	price	description	created_at	updated_at	
        \DB::table('services')->insert([
            [
                'code' => 'ser1',
                'name' => 'Body Wash Full',
                'price' => '2500',
                'description' => 'ddbg  gfbg ',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'code' => 'ser2',
                'name' => 'Body Wash Half',
                'price' => '1500',
                'description' => 'ddbg half gfbg ',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'code' => 'ser3',
                'name' => 'Engine Repair',
                'price' => '3500',
                'description' => 'ddbg half gfbg ',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'code' => 'ser4',
                'name' => 'Fiber & paint',
                'price' => '5500',
                'description' => 'ddbg gfbg ',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

        ]);
    }
}

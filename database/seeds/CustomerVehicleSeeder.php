<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class CustomerVehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //user_id	bike_id	brand_id		created_at	updated_at	

        \DB::table('customer_vehicles')->insert([
            [
                'user_id' => 1,
                'bike_id' => '1',
                'brand_id' => '1',
                'register_number' => 'ccc1reg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'user_id' => 2,
                'bike_id' => '2',
                'brand_id' => '2',
                'register_number' => '2cccreg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'user_id' => 3,
                'bike_id' => '3',
                'brand_id' => '3',
                'register_number' => '3cccreg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

           
        ]);
    }
}

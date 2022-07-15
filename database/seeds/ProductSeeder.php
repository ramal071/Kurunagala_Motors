<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *	id	brand_id	bike_id	code	name	slug	product_image	description	status	created_at	updated_at	

     * @return void
     */
    public function run()
    {
        \DB::table('products')->insert([
            [
                'brand_id' => 1,
                'bike_id' => 1,
                'code' => 'pro01',
                'name' => 'Light',
                'slug' => 'light',
                'product_image' => 'logo.png',   
                'status' => 1,
                'description' => 'Manufactured by Japan',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'brand_id' => 2,
                'bike_id' => 2,
                'code' => 'pro02',
                'name' => 'Head Light',
                'slug' => 'head-light',
                'product_image' => 'logo.png',   
                'status' => 1,
                'description' => 'Manufactured by Indea',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'brand_id' => 2,
                'bike_id' => 5,
                'code' => 'pro03',
                'name' => 'Brake Light',
                'slug' => 'brake-light',
                'product_image' => 'logo.png',   
                'status' => 1,
                'description' => 'Manufactured by Indea',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'brand_id' => 3,
                'bike_id' => 3,
                'code' => 'pro04',
                'name' => 'Brake Light',
                'slug' => 'brake-light',
                'product_image' => 'logo.png',   
                'status' => 1,
                'description' => 'Manufactured by Indea',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'brand_id' => 4,
                'bike_id' => 4,
                'code' => 'pro05',
                'name' => 'Brake Light',
                'slug' => 'brake-light',
                'product_image' => 'logo.png',   
                'status' => 1,
                'description' => 'Manufactured by Indea',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
           
        ]);
    }
}

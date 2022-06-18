<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('bikes')->insert([
            [
                'brand_id' => 1,
                'code' => 'bike01',
                'name' => 'FZ',
                'slug' => 'fz',
                'description' => 'Manufactured by Japan'
            ],

            [
                'brand_id' => 2,
                'code' => 'bike02',
                'name' => 'CT100',
                'slug' => 'ct100',
                'description' => 'Manufactured by India'
            ],

            [
                'brand_id' => 3,
                'code' => 'bike03',
                'name' => 'GN125',
                'slug' => 'gn125',
                'description' => 'Manufactured by india & japan'
            ],

            [
                'brand_id' =>4,
                'code' => 'bike04',
                'name' => 'Vego',
                'slug' => 'vego',
                'description' => 'Manufactured by india'
            ],

            [
                'brand_id' => 2,
                'code' => 'bike05',
                'name' => 'Platna',
                'slug' => 'platna',
                'description' => 'Manufactured by India'
            ],
        ]);
    }
}

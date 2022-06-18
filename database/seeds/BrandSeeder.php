<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('brands')->insert([
            [
                'code' => 'brand01',
                'name' => 'Yamaha',
                'slug' => 'yamaha',
                'description' => 'Manufactured by Japan'
            ],

            [
                'code' => 'brand02',
                'name' => 'Bajaj',
                'slug' => 'bajaj',
                'description' => 'Manufactured by India'
            ],

            [
                'code' => 'brand03',
                'name' => 'Suzuki',
                'slug' => 'suzuki',
                'description' => 'Manufactured by india & japan'
            ],

            [
                'code' => 'brand04',
                'name' => 'TVS',
                'slug' => 'tvs',
                'description' => 'Manufactured by india'
            ]
        ]);
    }
}

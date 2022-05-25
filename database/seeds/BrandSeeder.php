<?php

use Illuminate\Database\Seeder;
use App\brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\brand::class, 5)->create();
    }
}

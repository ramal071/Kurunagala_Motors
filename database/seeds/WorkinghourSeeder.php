<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class WorkinghourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('workinghours')->insert([
            [
                'from' => '08:00',
                'to' => '17:30',
                'day' => 'Monday',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'from' => '08:00',
                'to' => '17:30',
                'day' => 'Tuseday',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'from' => '08:00',
                'to' => '17:30',
                'day' => 'Wednesday',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'from' => '08:00',
                'to' => '17:30',
                'day' => 'Thursday',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'from' => '08:00',
                'to' => '17:30',
                'day' => 'Friday',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'from' => '08:00',
                'to' => '17:30',
                'day' => 'Saturday',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],

            [
                'from' => '08:00',
                'to' => '17:30',
                'day' => 'Sunday',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}

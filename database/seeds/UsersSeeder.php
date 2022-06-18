<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([

            [
                'fname' => 'bbb',
                'lname' => 'bbb',
                'email'=>'bbb@test.com',
                'email_verified_at' => now(),
                'role_id'=> '1',
                'idno'=> '199511111v',
                'contact'=> '071211111',  
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ],

            [
                'fname' => 'aaa',
                'lname' => 'aaa',
                'email'=>'aaa@test.com',
                'email_verified_at' => now(),
                'role_id'=> '2',
                'idno'=> '199512222v',
                'contact'=> '071211222',  
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ],

            [
                'fname' => 'ccc',
                'lname' => 'ccc',
                'email'=>'ccc@test.com',
                'email_verified_at' => now(),
                'role_id'=> '3',
                'idno'=> '199511133v',
                'contact'=> '071211333',  
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ],
       
    ]);

        //User::factory()->times(10)->create();
        
        // $user =factory(User::class, 8)->create();
        // $user->each(function(User $user) {

        //     if($user->role == "manager"){
        //         factory(Manager::class,1)->create([
        //             'user_id'=>$user->id
        //         ]);
        //     }
        // });
    }

}
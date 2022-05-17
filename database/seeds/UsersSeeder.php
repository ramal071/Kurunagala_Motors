<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User::factory()->times(10)->create();
        
        $user =factory(User::class, 8)->create();
        $user->each(function(User $user) {

            if($user->role == "manager"){
                factory(Manager::class,1)->create([
                    'user_id'=>$user->id
                ]);
            }
        });
    }
}
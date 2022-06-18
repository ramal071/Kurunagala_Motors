<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BikePolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function create(User $user)
    {
        if ($user->role->contains('slug', 'manager')) { 
            return true;
        }elseif($user->permissions->contains('slug', 'create')){
            return true;
        }
        return false;
    }
    


    public function update(User $user, Bike $bike)
    {
        if($user->role->contains('slug', 'manager')){
            return true;
        } elseif($user->permissions->contains('slug', 'update')) {
            return true;
        }

        return false;
    }

    public function destroy(User $user, Bike $bike)
    {
        if($user->permissions->contains('slug', 'delete')) {
            return true;
        } elseif ($user->role->contains('slug', 'manager')) {
            return true;
        }
        return false;
    }
}

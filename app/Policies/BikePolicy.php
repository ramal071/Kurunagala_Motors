<?php

namespace App\Policies;

use App\User;
use App\Bike;
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
        // if ($user->role->contains('slug', 'manager')) { 
        //     return true;
        // }elseif($user->permissions->contains('slug', 'create')){
        //     return true;
        // }
        // return false;
    }
    
    public function edit(User $user, Bike $bike)
    {
        // if($user->permissions->contains('slug', 'edit')) {
        //     return true;
        // } elseif ($user->role->contains('slug', 'manager')) {
        //     return true;
        // }
        //  return false;
    }

    public function update(User $user, Bike $bike)
    {
        // if($user->role->contains('slug', 'manager')){
        //     return true;
        // } elseif($user->permissions->contains('slug', 'edit')) {
        //     return true;
        // }

        // return false;
    }

    public function delete(User $user, Bike $bike)
    {
        // if($user->permissions->contains('slug', 'delete')) {
        //     return true;
        // } elseif ($user->role->contains('slug', 'manager')) {
        //     return true;
        // }
        // return false;
    }
}

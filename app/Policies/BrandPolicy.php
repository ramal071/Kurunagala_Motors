<?php

namespace App\Policies;

use App\User;
use App\brand;
use Illuminate\Auth\Access\HandlesAuthorization;

class BrandPolicy
{
    use HandlesAuthorization;


    public function before($user, $ability)
    {
        if ($user->isManager()) {
            return true;
        }
    }
    
    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, brand $brand)
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

    public function edit(User $user, brand $brand)
    {
        if($user->permissions->contains('slug', 'edit')) {
            return true;
        } elseif ($user->role->contains('slug', 'manager')) {
            return true;
        }
         return false;
    }


    public function update(User $user, brand $brand)
    {
        if($user->role->contains('slug', 'manager')){
            return true;
        } elseif($user->permissions->contains('slug', 'edit')) {
            return true;
        }

        return false;
    }

    public function delete(User $user, brand $brand)
    {
        if($user->permissions->contains('slug', 'delete')) {
            return true;
        } elseif ($user->role->contains('slug', 'manager')) {
            return true;
        }
        return false;
    }

    public function restore(User $user, brand $brand)
    {
        //
    }

    public function forceDelete(User $user, brand $brand)
    {
        //
    }
}

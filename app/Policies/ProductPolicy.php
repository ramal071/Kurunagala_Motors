<?php

namespace App\Policies;

use App\User;
use App\Product;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

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


    public function create(User $user)
    {
        if ($user->role->contains('slug', 'manager')) { 
            return true;
        }elseif($user->permissions->contains('slug', 'create')){
            return true;
        }
        return false;
    }

    // public function edit(User $user, Product $product)
    // {
    //     if($user->permissions->contains('slug', 'edit')) {
    //         return true;
    //     } elseif ($user->role->contains('slug', 'manager')) {
    //         return true;
    //     }
    //      return false;
    // }


    public function update(User $user, Product $product)
    {
        if($user->role->contains('slug', 'manager')){
            return true;
        } elseif($user->permissions->contains('slug', 'edit')) {
            return true;
        }

        return false;
    }

    public function delete(User $user, Product $product)
    {
        if($user->permissions->contains('slug', 'delete')) {
            return true;
        } elseif ($user->role->contains('slug', 'manager')) {
            return true;
        }
        return false;
    }
}

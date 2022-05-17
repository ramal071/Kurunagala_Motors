<?php

namespace App\Policies;

use App\User;
use App\brand;
use Illuminate\Auth\Access\HandlesAuthorization;

class BrandPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any brands.
     *
     * @param  \App\User  $user
     * @return mixed
     */

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
        if ($user->role->contains('slug', 'manager')) { // editor ta vitharai create
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
        // } elseif($brand->userId == $user->id) {
        //     return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the brand.
     *
     * @param  \App\User  $user
     * @param  \App\Brand  $brand
     * @return mixed
     */
    public function delete(User $user, brand $brand)
    {
        if($user->permissions->contains('slug', 'delete')) {
            return true;
        } elseif ($user->role->contains('slug', 'manager')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the brand.
     *
     * @param  \App\User  $user
     * @param  \App\Brand  $brand
     * @return mixed
     */
    public function restore(User $user, brand $brand)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the brand.
     *
     * @param  \App\User  $user
     * @param  \App\Brand  $brand
     * @return mixed
     */
    public function forceDelete(User $user, brand $brand)
    {
        //
    }
}

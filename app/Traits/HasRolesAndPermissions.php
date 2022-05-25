<?php

namespace App\Traits;

use App\User;
use App\Role;
use App\Permission;
trait HasRolesAndPermissions
{
      public function isManager()
    {
        if($this->role->contains('slug', 'manager')){
            return true;
        }
    }

    public function role()
    {
        return $this->belongsToMany(Role::class,'users_roles');
    }

    // public function role()
    // {
    //     return $this->hasOne(Role::class, 'role_id', 'id');
    // }

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_id', 'id');
    // }


    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'users_permissions');
    }

    public function hasRole($role)
    {   
        if ($this->role->contains('slug', $role)) {
                        return true;
                    }
                    return false; 

       
    }
}
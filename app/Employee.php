<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    protected $fillable =[];


    public function roles(){
        return $this->belongsToMany(Role::class,
         'employee_role', 'employee_id', 'role_id')->withTimestamps();
    }
}

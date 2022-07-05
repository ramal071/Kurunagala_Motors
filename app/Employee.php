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

    // public function servicerepairs()
    // {
    //     return $this->belongsToMany(ServiceRepair::class,'employee_service_repairs','employee_id','service_repair_id')->withTimestamps();
    // }

    public function servicerepair()
    {
        return $this->hasMany(ServiceRepair::class, 'employee_id', 'id');
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class, 'employee_id' , 'id');
    }

    public function salary()
    {
        return $this->hasMany(Salary::class, 'employee_id' , 'id');
    }

    public function leave()
    {
        return $this->hasMany(Leave::class, 'employee_id' , 'id');
    }

}

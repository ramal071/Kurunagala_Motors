<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    
    protected $fillable = [];

    public function employees()
    {
        return $this->belongsToMany(Employee::class,'employee_role','role_id','employee_id');
    }
    
}

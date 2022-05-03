<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeRole extends Model
{

    protected $table = "employee_role";

    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeServiceRepair extends Model
{
    protected $table = "employee_service_repairs";

    public function servicerepair(){
        return $this->belongsTo(ServiceRepair::class);
    }
}

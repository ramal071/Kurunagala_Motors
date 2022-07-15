<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function attendance()
    {
        return $this->belongsTo(Attendances::class, 'attendance_id', 'id');
    }
}

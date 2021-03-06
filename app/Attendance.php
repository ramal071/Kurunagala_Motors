<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function salary()
    {
        return $this->hasMany(Salary::class, 'attendance_id' , 'id');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = [
            'service_id',
            'employee_id',
            'worked_days',
            'half_days',
            'allowance',
            'total_salary',
            'job_amount',
            'allowance',

    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function attendance()
    {
        return $this->belongsTo(Attendances::class, 'attendance_id', 'id');
    }

    public function servicerepair()
    {
        return $this->belongsTo(ServiceRepair::class, 'servicerepair_id', 'id');
    }

    public function allowance()
    {
        return $this->belongsTo(Allowance::class, 'allowance_id', 'id');
    }
}

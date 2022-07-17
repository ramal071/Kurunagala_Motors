<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function salary()
    {
        return $this->hasMany(Salary::class, 'loan_id' , 'id');
    }
}

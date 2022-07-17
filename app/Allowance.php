<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allowance extends Model
{
    protected $fillable = [
        'employee_id',
        'allowance',

];

public function employee()
{
    return $this->belongsTo(Employee::class, 'employee_id', 'id');
}

public function salary()
{
    return $this->hasMany(Salary::class, 'allowance_id' , 'id');
}

}

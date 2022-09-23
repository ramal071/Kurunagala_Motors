<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceRepair extends Model
{

    protected $fillable = [
        'user_id','customervehicle_id','amount',
            'charge',
            'description',
            'service_id',
            'employee_id',
            'email',
            'paid_amount',
            'status',
            'is_repaircomplete',
            'is_borrow',
            'is_complete',
            'code',
            'fixprice',
            'qty',
            'servicerepair_id',
            'service_price',
            'stock_items_sum',
         
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function customervehicle()
    {
        return $this->belongsTo(CustomerVehicle::class, 'customervehicle_id', 'id');
    }


    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function stock()
    {
        return $this->belongsToMany(Stock::class)->withTimestamps()->withPivot('qty','service_repair_id','stock_id');
    }

    public function salary()
    {
        return $this->hasMany(Salary::class, 'servicerepair_id' , 'id');
    }

    public function income()
    {
        return $this->hasMany(Income::class, 'servicerepair_id' , 'id');
    }
}

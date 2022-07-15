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
            'fixprice'
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

    // public function stock()
    // {
    //     return $this->belongsTo(Stock::class, 'stock_id', 'id');
    // }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    // public function employee()
    // {
    //     return $this->belongsToMany(Employee::class, 'employee_service_repairs', 'service_repair_id','employee_id')->withTimestamps();
    // }

    // public function service()
    // {
    //     return $this->belongsToMany(Service::class, 'service_service_repairs', 'service_repair_id','service_id')->withTimestamps();
    // }

    public function stock()
    {
        return $this->belongsToMany(Stock::class)->withTimestamps();
    }

    // public function stockparts()
    // {
    // return $this->belongsToMany(Stock::class,'service_repair_stock','service_repair_id','stock_id')->withTimestamps();
    // }
}

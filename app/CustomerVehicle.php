<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerVehicle extends Model
{
    public function bike()
    {
        return $this->belongsTo(Bike::class, 'bike_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(brand::class, 'brand_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function customerpendingservice()
    {
        return $this->hasMany(CustomerPendingService::class, 'customervehicle_id', 'id');
    }
    
    public function customerpendingpayment()
    {
        return $this->hasOne(CustomerPendingPayment::class, 'customervehicle_id', 'id');
    }

    public function servicerepair()
    {
        return $this->hasMany(ServiceRepair::class, 'customervehicle_id', 'id');
    }
}

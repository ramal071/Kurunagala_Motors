<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    // public function servicetype()
    // {
    //     return $this->belongsTo(Servicetype::class, 'servicetype_id', 'id');
    // }

    // public function servicetype()
    // {
    //     return $this->belongsTo(Servicetype::class, 'servicetype_id', 'id');
    // }

    public function customerpendingservice()
    {
        return $this->hasMany(CustomerPendingService::class, 'service_id', 'id');
    }

    public function customerpendingpayment()
    {
        return $this->hasMany(CustomerPendingPayment::class, 'service_id', 'id');
    }

    public function servicerepair()
    {
        return $this->hasMany(ServiceRepair::class, 'service_id', 'id');
    }

    // public function servicerepairs()
    // {
    //     return $this->belongsToMany(ServiceRepair::class,'service_service_repairs','service_id','service_repair_id')->withTimestamps();
    // }
}

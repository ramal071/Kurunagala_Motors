<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    public function income()
    {
        return $this->hasMany(Income::class, 'service_id' , 'id');
    }

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

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerPendingPayment extends Model
{
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }

    public function customervehicle()
    {
        return $this->belongsTo(CustomerVehicle::class, 'customervehicle_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

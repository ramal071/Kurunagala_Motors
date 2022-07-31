<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Databas\Eloquent\HasFactory;



class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'idno', 'email','fname','lname','password','status','email_verified_at','role','contact'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'status' => 'boolean'
    ];

    public function roles()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function isCustomer(){
        return $this->hasOne(Customer::class, 'user_id', 'id');
    }

    public function customervehicle()
    {
        return $this->hasMany(CustomerVehicle::class, 'user_id', 'id');
    }

    public function customerpendingservice()
    {
        return $this->hasMany(CustomerPendingService::class, 'user_id', 'id');
    }

    public function customerpendingpayment()
    {
        return $this->hasOne(CustomerPendingPayment::class, 'user_id', 'id');
    }

    public function servicerepair()
    {
        return $this->hasOne(ServiceRepair::class, 'user_id', 'id');
    }

  
    function getServicerepair()
    {
        return $this->hasMany('app\servicerepair');
    }



    

}

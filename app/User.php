<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Traits\HasRolesAndPermissions;

class User extends Authenticatable
{
    use Notifiable, HasRolesAndPermissions;

    protected $fillable = [
        'idno', 'email','fname','lname','password','status','email_verified_at','role','contact', 'permission'
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
        return $this->hasOne(Role::class, 'role_id', 'id');
    }

    public function isCustomer(){
        return $this->hasOne(Customer::class, 'user_id', 'id');
    }



    

}

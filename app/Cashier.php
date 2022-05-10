<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\Cashier as Authenticatable;

class Cashier extends Model

{
 

    protected $fillable = [
        'name', 'idno', 'email', 'password'
   ];

    protected $casts = [
        'status'=>'boolean'
    ];

}


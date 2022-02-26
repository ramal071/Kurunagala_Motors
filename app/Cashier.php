<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cashier extends Model

{
    protected $table = 'cashiers' ;

    protected $fillable = [
   ];

    protected $casts = [
        'status'=>'boolean'
    ];

}


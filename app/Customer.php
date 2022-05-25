<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function getDetails(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

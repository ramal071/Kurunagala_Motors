<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionUser extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReconditionProduct extends Model
{
    protected $fillable = ['id', 'stock_id', 'name']; 

    public function stock()
    {
        return $this->hasMany(Stock::class, 'stock_id', 'id');
    }
}

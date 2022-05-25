<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function damage()
    {
        return $this->belongsTo(DamageProduct::class, 'damage_id', 'id');
    }

    public function recondition()
    {
        return $this->belongsTo(ReconditionProduct::class, 'recondition_id', 'id');
    }
}

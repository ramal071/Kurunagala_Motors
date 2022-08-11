<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Limit extends Model
{
    public function stock()
    {
        return $this->belongsTo(stock::class, 'stock_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(product::class, 'product_id', 'id');
    }

}

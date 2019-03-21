<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductContent extends Model
{
    public function product_holding()
    {
        return $this->belongsTo('App\ProductHolding');
    }
}

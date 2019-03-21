<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductHolding extends Model
{
    public function product_content()
    {
        return $this->hasMany('App\ProductContent');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funding extends Model
{
    public function product_content()
    {
        return $this->belongsTo('App\ProductContent');
    }

    public function user()
    {
    		return $this->belongsTo('App\User');
    }
}

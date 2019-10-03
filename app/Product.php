<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }
	public function orders()
    {
        return $this->belongsToMany('App\Order_product');
    }
}

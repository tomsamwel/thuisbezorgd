<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_product extends Model
{
	public function getEurPriceAttribute()
    {
		return ("€ ".number_format($this->price/100,2));
    }
	public function Order()
    {
        return $this->belongsTo('App\Order');
    }
	public function product()
    {
        return $this->belongsTo('App\Product');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

	public function getTotalAttribute()
    {
		$total = 0;
		foreach ($this->order_products as $order_product) {
			$total = $total + ($order_product->quantity * $order_product->price);
		}
		return ("€ ".number_format($total/100,2));
    }
	public function user()
    {
        return $this->belongsTo('App\User');
    }
	public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }
	public function order_products()
    {
        return $this->hasMany('App\Order_product');
    }
}

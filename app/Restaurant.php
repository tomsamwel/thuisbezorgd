<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
	protected $attributes = [
        'photo' => 'restaurant.jpeg',
    ];
	public function products()
    {
        return $this->hasMany('App\Product');
    }
	public function orders()
    {
        return $this->hasMany('App\Order');
    }
	public function owner()
    {
        return $this->belongsTo('App\User');
    }
}

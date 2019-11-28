<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
	protected $fillable =
	[
		'user_id','kvk','name','address','zipcode','city','phone','email','photo','open','close',
	];

	protected $attributes =
	[
        'photo' => 'restaurant.jpeg',
    ];

	public function addProduct($product)
	{
		$this->products()->create($product);
	}

	public function getIsOpenAttribute()
    {
		$time = date('H:i:s');
		if ($this->open < $time && $this->close > $time) {
			return 1;
		}
		return 0;
    }

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

	public function open_hours()
    {
        return $this->hasMany('App\Open_hour');
    }
}

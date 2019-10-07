<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	//default values
	protected $attributes = [
        'photo' => 'product.jpeg',
    ];

	//array of categories
	public static $categories = [
		0 => 'Dranken',
		1 => 'bijgerechten',
		2 => 'Hoofdgerechten'
	];
	//get product category by array index ^ see above
	public function getCategory()
    {
		return self::$categories[ $this->category ];
    }


	//relations
	public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }
	public function orders()
    {
        return $this->belongsToMany('App\Order_product');
    }
}

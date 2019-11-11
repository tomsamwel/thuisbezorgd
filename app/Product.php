<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	use SoftDeletes;

	//default values
	protected $attributes = [
        'photo' => 'product.jpeg',
    ];

	protected $fillable = [
		'name', 'price', 'category', 'restaurant_id'
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

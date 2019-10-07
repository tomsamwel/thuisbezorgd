<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Open_hour extends Model
{
	public function restaurant()
	{
		return $this->belongsTo('App\Restaurant');
	}
}

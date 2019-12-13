<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionController extends Controller
{

	public function products()
	{
		
		return session('products', 0);
	}

	public function storeProducts(Request $request)
	{
		session(['products' => $request->products]);
		return session('products', 0);
	}
}

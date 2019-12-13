<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Order_product;

use Auth;

class OrderController extends Controller
{
    public function store(Request $request){
		$user = Auth::user();

		$products = json_decode($request->products);

		$order = new Order;
		$order->restaurant_id = $request->restaurant_id;
		$user->orders()->save($order);

		foreach ($products as $product) {
			$order_product = new Order_product;
			$order_product->product_id = $product->id;
			$order_product->quantity = $product->quantity;
			$order_product->price = $product->price;
			$order_product->order_id = $order->id;
			$order_product->save();
		}

		return 'success';
	}
}

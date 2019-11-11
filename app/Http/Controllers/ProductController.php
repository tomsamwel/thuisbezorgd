<?php

namespace App\Http\Controllers;

use Auth;
use App\Product;
use Illuminate\Http\Request;
use App\Restaurant;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		$user = Auth::user();
		$restaurant = Restaurant::findOrFail($request->restaurant_id);
		$restaurants = $user->restaurants;
        return view('product.new', compact('restaurant','restaurants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$validated = request()->validate([
            'name' => ['required'],
			'category' => ['required','integer'],
            'price' => ['required','integer'],
			'restaurant_id' => ['integer']
        ]);
		Product::create($validated);

		return redirect(route('restaurants.show', $request->restaurant_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return 'no';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
		$validated = request()->validate([
            'name' => ['required'],
			'category' => ['required','integer'],
            'price' => ['required','integer'],
			'restaurant_id' => ['integer']
        ]);
        $product->update($validated);
		return 'success';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
		$product->delete();
		return redirect()->back();
    }
}

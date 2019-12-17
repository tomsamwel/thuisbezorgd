<?php

namespace App\Http\Controllers;

use Auth;
use App\Product;
use App\Restaurant;
use Illuminate\Http\Request;
use Image;

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
     * Show the form with all of the current users restaurants for creating a new resource.
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
		$restaurant = Restaurant::findOrFail($request->restaurant_id);

		$validated_product = request()->validate([
            'name' => ['required'],
			'category' => ['required','integer'],
            'price' => ['required','integer'],
			'photo' => ['file','image','mimes:jpg,jpeg,png,gif','max:4096'],
        ]);

		// Check if a profile image has been uploaded
        if ($request->has('photo')) {
            // Get image file original extension
			$imgExtension = $request->file('photo')->getClientOriginalExtension();
			// Intervention image cropping
			$image = Image::make($request->file('photo'))->fit(500);
            // Make a image name based on user id and unique id
            $name = uniqid($product->name.'_');
            // Upload image with original extension
			$storedImage = $image->save('storage/uploads/images/'.$name.'.'.$imgExtension, 100);
            // Set user profile image path in database to filePath
            $validated_product['photo'] = $name.'.'.$imgExtension;
        }
        // Persist user record to database
		$restaurant->addProduct($validated_product);

		return redirect(route('restaurants.show', $restaurant->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return $product;
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
		$validated_product = request()->validate([
            'name' => ['required'],
			'category' => ['required','integer'],
            'price' => ['required','integer'],
			'restaurant_id' => ['integer'],
			'photo' => ['file','image','mimes:jpg,jpeg,png,gif','max:4096'],
        ]);
		// Check if a profile image has been uploaded
        if ($request->has('photo')) {
            // Get image file original extension
			$imgExtension = $request->file('photo')->getClientOriginalExtension();
			// Intervention image cropping
			$image = Image::make($request->file('photo'))->fit(500);
            // Make a image name based on user id and unique id
            $name = uniqid($product->name.'_');
            // Upload image with original extension
			$storedImage = $image->save('storage/uploads/images/'.$name.'.'.$imgExtension, 100);
            // Set user profile image path in database to filePath
            $validated_product['photo'] = $name.'.'.$imgExtension;
        }
        $product->update($validated_product);
		return redirect()->route('restaurants.show', $product->restaurant->id);
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

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
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
		$products = Product::paginate(20);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
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
		return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
		return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use Auth;
use App\Restaurant;
use App\Product;
use App\Open_hour;

use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

		$restaurants = Restaurant::paginate(10);

        return view('restaurant.index', ['restaurants' => $restaurants]);
    }


	public function search(Request $request)
    {
		$search = $request->get('term');

		$result = Restaurant::where('name', 'LIKE', '%'. $search. '%')->get();

		return response()->json($result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		Restaurant::create([
			'user_id' => Auth::user()->id,

		]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
		
		$drinks = $restaurant->products->where('category', 0);
		$sides = $restaurant->products->where('category', 1);
		$main = $restaurant->products->where('category', 2);
		$categories = [
			'main' => $main,
			'sides' => $sides,
			'drinks' => $drinks,
		];

        return view('restaurant.view', compact('restaurant', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }
}

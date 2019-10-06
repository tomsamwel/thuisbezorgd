<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Restaurant;
use App\Product;
use App\Order;
use App\Order_product;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $u = new User();
		$u->name = 'zippy';
		$u->password = bcrypt('password');
		$u->email = 'zippy@zip.co';
		$u->address = 'zipstreet 420';
		$u->city = 'Food-town';
		$u->zipcode = '6969ZI';
		$u->phone = rand(1000000000,10000000000);
		$u->save();

		for ($i=0; $i < 20; $i++)
		{
			$r = new Restaurant();
			$r->name = 'restaurant_' . Str::random(4);
			$r->kvk = rand(1000000,100000000);
			$r->address = 'restaurant st. 222_'. Str::random(4);
			$r->zipcode = rand(1000,9999).Str::random(2);
			$r->city = 'city_'. Str::random(4);
			$r->phone = rand(1000000000,10000000000);
			$r->email = $r->name .'@example.com';
			$r->photo = 'restaurant.jpeg';


			$u->restaurants()->save($r);

			for ($j=0; $j < 5; $j++)
			{
				$p = new Product();
				$p->name = $r->name . '_product_' . rand(0,10);
				$p->price = rand(1,30). '99';
				$p->category = rand(1,3);
				$p->photo = 'product.jpeg';

				$r->products()->save($p);
			}
		}



		$u = new User();
		$u->name = 'mcEater';
		$u->password = bcrypt('password');
		$u->email = 'hungry@stomach.io';
		$u->address = 'eat av. 555';
		$u->city = 'Food-town';
		$u->zipcode = '6969OG';
		$u->phone = rand(1000000000,10000000000);
		$u->save();

		$r = Restaurant::find(rand(1,3));
		$r_products = $r->products;

		$o = new Order;
		$o->restaurant_id = $r->id;

		$u->orders()->save($o);

		foreach ($r_products as $r_product) {
			if (rand(0,1) == 1) {
				$o_p = new Order_product;
				$o_p->product_id = $r_product->id;
				$o_p->quantity = rand(1,2);
				$o_p->price = $r_product->price;
				$o->products()->save($o_p);
			}

		}



    }
}

<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Restaurant;
use App\Product;
use App\Order;
use App\Order_product;

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
		$u->zipcode = '6969ZI';
		$u->phone = 31612345678;
		$u->save();

    }
}

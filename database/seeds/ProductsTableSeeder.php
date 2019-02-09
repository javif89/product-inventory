<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create the products
        for ($i = 0; $i < 20; $i++) {
            $product = factory('App\Product')->create([
                'name' => 'Product '.($i+1)
            ]);
        }
    }
}

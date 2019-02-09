<?php

use Illuminate\Database\Seeder;

class VariantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Add Variants to the products
        foreach(\App\Product::all() as $product) {
            $product->variants()->saveMany(factory('App\Variant', 5)->create());
        }
    }
}

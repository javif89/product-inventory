<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++) {
            $product = factory('App\Product')->create([
                'name' => 'Product '.$i
            ]);
        }
//        factory('App\User',5)->create()->each(function (\App\User $user) {
//            $products = factory('App\Product',10)->create();
//
//            $products->each(function (\App\Product $product){
//                $variants = factory('App\Variant',2)->create();
//                $product->variants()->saveMany($variants);
//            });
//
//            $productIDs = $products->pluck('id');
//            $user->products()->attach($productIDs);
//        });
    }
}

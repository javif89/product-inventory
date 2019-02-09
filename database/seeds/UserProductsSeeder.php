<?php

use Illuminate\Database\Seeder;

class UserProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Attach products to users
        \App\User::all()->each(function (\App\User $user) {
            $products = \App\Product::inRandomOrder()->limit(10)->get()->each(function(\App\Product $product) use($user) {
                $user->products()->attach($product->id);

                $variants = $product->variants()->inRandomOrder()->limit(2)->get()->each(function (\App\Variant $variant) use ($user) {
                    $user->variants()->attach($variant->id);
                });
            });
        });
    }
}

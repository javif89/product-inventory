<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'brand' => $faker->company
    ];
});

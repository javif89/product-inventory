<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(App\Variant::class, function (Faker $faker) {

    $variantTypes = array("color","size");
    $size = array("small","medium","large");

    $type = $variantTypes[array_rand($variantTypes)];

    if($type == "color") {
        $value = $faker->colorName;
    }
    else {
        $value = $size[array_rand($size)];
    }

    return [
        'type' => $type,
        'value' => $value,
        'product_id' => 1
    ];
});

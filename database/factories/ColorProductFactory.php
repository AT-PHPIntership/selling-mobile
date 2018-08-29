<?php

use Faker\Generator as Faker;

$factory->define(App\Models\ColorProduct::class, function (Faker $faker) {
    return [
        'product_id' => App\Models\Product::all()->random()->id,
        'color' => $faker->text(20),
        'path_image' => $faker->imageUrl($width = 200, $height = 200),
        'quantity' => $faker->randomDigit,
        'price_color_value' => $faker->numberBetween(1000, 100000000),
        'price_color_type' => $faker->randomElement(["percent", "currencies"])
    ];
});

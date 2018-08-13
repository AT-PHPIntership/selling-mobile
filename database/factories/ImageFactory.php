<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Image::class, function (Faker $faker) {
    return [
        'product_id' => App\Models\Product::all()->random()->id,
        'path_image' => $faker->imageUrl($width = 200, $height = 200)
    ];
});

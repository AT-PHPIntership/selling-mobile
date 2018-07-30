<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Image::class, function (Faker $faker) {
    return [
        'color_product_id' => App\Models\ColorProduct::all()->random()->id,
        'path' => 'img.png'
    ];
});

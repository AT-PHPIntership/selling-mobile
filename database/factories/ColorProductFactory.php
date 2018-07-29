<?php

use Faker\Generator as Faker;

$factory->define(App\Models\ColorProduct::class, function (Faker $faker) {
    return [
        'product_id' => App\Models\Product::all()->random()->id,
        'color' => $faker->text(20),
        'unit_price' => $faker->numberBetween(1000,100000000 )
    ];
});

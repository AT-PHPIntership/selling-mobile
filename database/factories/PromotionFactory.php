<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Promotion::class, function (Faker $faker) {
    return [
        'product_id' => App\Models\Product::all()->random()->id,
        'from_date' => date($format = 'Y-m-d H:i:s'),
        'to_date' => $faker->dateTimeBetween('+1 week', '+1 month'),
        'promotion_type' => $faker->randomElement(["percent", "currencies"]),
        'promotion_value' => $faker->numberBetween(1000, 100000000),
    ];
});

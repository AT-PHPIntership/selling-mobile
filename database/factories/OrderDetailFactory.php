<?php

use Faker\Generator as Faker;

$factory->define(App\Models\OrderDetail::class, function (Faker $faker) {
    return [
        'order_id' => App\Models\Order::all()->random()->id,
        'product_id' => App\Models\Product::all()->random()->id,
        'amount' => $faker->numberBetween(10000, 100000000)
    ];
});

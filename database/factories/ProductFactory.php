<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'quantity' => $faker->numberBetween($min = 10000, $max = 100000000),
        'manufacturing_date' => date($format = 'Y-m-d'),
        'status' => $faker->numberBetween(0, 1),
        'producer' => $faker->text(200),
        'detail' => $faker->text(200),
        'description' => $faker->text(200),
        'category_id' => App\Models\Category::all()->random()->id
    ];
});

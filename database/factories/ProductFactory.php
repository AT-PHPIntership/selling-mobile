<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'manufacturing_date' => date($format = 'Y-m-d'),
        'price' => $faker->numberBetween(1000, 100000000),
        'producer' => $faker->text(200),
        'detail' => $faker->text(200),
        'description' => $faker->text(300),
        'category_id' => App\Models\Category::all()->random()->id
    ];
});

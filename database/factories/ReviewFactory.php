<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Review::class, function (Faker $faker) {
    return [
        'product_id' => App\Models\Product::all()->random()->id,
        'content' => $faker->text(200),
        'parent_id' => $reviews->id
    ];
});

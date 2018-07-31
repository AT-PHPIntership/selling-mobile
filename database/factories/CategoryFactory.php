<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
$factory->state(App\Models\Category::class, 'id', function (Faker $faker) {
    $category = App\Models\Category::all()->random();
    return [
        'parent_id' => $category->id,
    ];
});
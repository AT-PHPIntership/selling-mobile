<?php

use Faker\Generator as Faker;

$factory->define(App\Models\AboutStore::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'phonenumber' => $faker->e164PhoneNumber,
        'description' => $faker->text(500)
    ];
});

<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'username' => $faker->unique()->username,
        'email' => $faker->unique()->email,
        'password' => bcrypt('12345'),
        'phonenumber' => $faker->e164PhoneNumber,
        'address' => $faker->address,
        'role' => $faker->numberBetween($min = 0, $max = 1),
        'remember_token' => str_random(10)
    ];
});

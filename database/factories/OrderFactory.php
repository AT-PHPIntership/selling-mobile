<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Order::class, function (Faker $faker) {
    return [
    	'quantity' => $faker->numberBetween(0, 1000 ),
    	'date_checkout' =>date($format = 'Y-m-d H:m:s'),
    	'status' => $faker->numberBetween($min = 0, $max = 1),
        'user_id' => App\Models\User::all()->random()->id,
        'total_price' => $faker->numberBetween(10000,100000000)   
    ];
});

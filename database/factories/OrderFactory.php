<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'code' => $faker -> unique() -> word,
        'customer_name' => $faker -> name,
        'customer_address' => $faker -> streetAddress,
        'customer_phone' => "392-" . rand(1234567, 9876543),
        'date' => $faker -> dateTimeBetween('-30 years','now'),
        'status' => "status",
        'total_price' => rand(1000,10000),
    ];
});

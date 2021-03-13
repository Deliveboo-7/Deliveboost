<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'code' => $faker -> unique() -> numberBetween(1111, 9999),
        'customer_name' => $faker -> name,
        'customer_address' => $faker -> streetAddress,
        'customer_phone' => "392-" . rand(1234567, 9876543),
        'date' => $faker -> dateTimeBetween('-5 years','now'),
        'status' => "status",
        'total_price' => rand(1000, 50000),
    ];
});

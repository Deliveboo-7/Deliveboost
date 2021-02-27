<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Dish;
use Faker\Generator as Faker;

$factory->define(Dish::class, function (Faker $faker) {
    return [
        'desc' => $faker -> sentence,
        'name' => $faker -> name,
        'price' => rand(250,3000),
        'visible' => rand(0,1),
        'type' => "nullable"
    ];
});

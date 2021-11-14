<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Dish;
use Faker\Generator as Faker;

$factory->define(Dish::class, function (Faker $faker) {

    $faker = \Faker\Factory::create();
\Bezhanov\Faker\ProviderCollectionHelper::addAllProvidersTo($faker);

    return [
        'desc' => $faker -> ingredient . ', ' . $faker -> ingredient . ', ' . $faker -> ingredient,
        'name' => $faker -> word,
        'price' => rand(250,3000),
        'visible' => rand(0,1),
        'type' => "nullable"
    ];
});

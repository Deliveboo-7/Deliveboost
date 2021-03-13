<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {

    
    $faker = \Faker\Factory::create();
\Bezhanov\Faker\ProviderCollectionHelper::addAllProvidersTo($faker);


    return [
        'email' => $faker -> unique() -> safeEmail,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'company_name' => $faker -> spice . ' '. $faker -> measurement,
        'address' => $faker -> streetAddress(),
        'vat' => $faker->shuffle('01234567890'),
        'phone_number' => "392-" . rand(1234567, 9876543),
        'opening_info' => $faker -> sentence(),
        'website' => 'www.website.com',
        'delivery_time'=> $faker->randomElement(['5', '10', '15','20', '25', '30']),
        'price_range'=> $faker->randomElement(['€', '€€', '€€€']), 
        'vote_average' => $faker -> numberBetween(1, 3),
        'remember_token' => Str::random(10),
    ];
});

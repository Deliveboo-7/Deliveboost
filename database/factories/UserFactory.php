<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {
    return [
        'email' => $faker -> unique() -> safeEmail,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'company_name' => $faker -> name,
        'address' => $faker -> $faker -> streetAddress(),
        'vat' => $faker -> vat(),
        'img' => "logo ristorante",
        'phone_number' => $faker -> phoneNumber(),
        'opening_info' => $faker -> sentence(),
        'website' => $faker -> url,
        'remember_token' => Str::random(10),
    ];
});

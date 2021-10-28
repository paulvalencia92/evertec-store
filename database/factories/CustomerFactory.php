<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'name' => $faker->name,
        'movil' => $faker->phoneNumber,
        'address' => 'Calle falsa 1234',
        'city' => 'El Cerrito, Valle del cauca',
    ];
});

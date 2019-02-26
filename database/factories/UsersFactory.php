<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;


$factory->define(App\User::class, function (Faker $faker) {
	$role=[
 'user',
];
    return [
        'f_name' => $faker->name,
        'l_name' => $faker->name,
        'national_id' => $faker->unique()->numberBetween($min = 1520000, $max = 180000),
        'phone_no' => $faker->unique()->phoneNumber,
        'role' => $faker->randomElement($role),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => app('hash')->make('secret'),
        'remember_token' => str_random(10),
    ];
});


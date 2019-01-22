<?php

use Faker\Generator as Faker;

$factory->define(App\ProduceDetail::class, function (Faker $faker) {
	$teano=App\Tea::pluck('tea_no')->toArray();
	$userid=App\User::pluck('id')->toArray();
    return [
        'user_id' => $faker->randomElement($userid),
        // 'tea_id' => $faker->number,
        'tea_no' => $faker->randomElement($userid),
        'receipt_no' => $faker->RandomNumber,
        'gross_weight' => $faker->RandomNumber,
        'net_weight' => $faker->RandomNumber,
        'total_as_at_day' => $faker->RandomNumber,
        'date_offered' => $faker->date,
    ];
});

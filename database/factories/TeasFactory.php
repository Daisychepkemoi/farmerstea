<?php

use Faker\Generator as Faker;

$factory->define(App\Tea::class, function (Faker $faker) {
	$name=App\User::pluck('id')->toArray();
	$fert=array('1','2','3','4','5','6','7','8');
	$location=array('kapkarin','cheborgei','chebwagan','america','lalagin','kiptewit','kapsir','sosit');
    return [
        'user_id' => $faker->randomElement($name),
        'tea_no' => $faker->RandomNumber,
        // 'teanumber' => $faker->RandomNumber,
        'no_acres' => $faker->RandomNumber,
        'expected_produce' => $faker->RandomNumber,
        'no_of_fert' => $faker->randomElement($fert),
        'bonus' => $faker->RandomNumber,
        'location' =>$faker->randomElement($location),
    ];
});

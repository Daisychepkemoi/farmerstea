<?php

use Faker\Generator as Faker;

$factory->define(App\Tea::class, function (Faker $faker) {
	$name=App\User::pluck('id')->toArray();
	$fert=array('1','2','3','4','5','6','7','8');
	$location=array('kapkarin','cheborgei','chebwagan','america','lalagin','kiptewit','kapsir','sosit');
    $acres=$faker->numberBetween($min = 1, $max = 10);
     $expected_produce= (911* $acres);
        $bonus= $expected_produce * 28;
        $fert=   8 * $acres;
    return [
        'user_id' => $faker->unique()->randomElement($name),
        'tea_no' => $faker->unique()->numberBetween($min = 100,$max = 900),
        'no_acres' => $acres,
        'expected_produce' =>$expected_produce,
        'no_of_fert' => $fert,
        'bonus' => $bonus,
        'location' =>$faker->randomElement($location),
    ];
});


<?php

use Faker\Generator as Faker;

$factory->define(App\Event::class, function (Faker $faker) {
	$name=App\User::pluck('id')->toArray();
	 // $startingDate = $faker->dateTimeThisYear('+4 month');
  //   $endingDate   = strtotime('+1 Week', $startingDate->getTimestamp());
     $startingDate = $faker->date;
  $endingDate  = $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now');
    return [
        'user_id' => $faker->randomElement($name),
        // 'tea_id' => $faker->number,
        'title' => $faker->sentence(20),
        'body' => $faker->sentence(50),
        'held_at' => $endingDate,
    ];
});

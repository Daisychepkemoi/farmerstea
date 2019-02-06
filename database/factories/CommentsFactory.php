<?php

use Faker\Generator as Faker;

$factory->define(App\Comments::class, function (Faker $faker) {
	$name=App\Posts::pluck('id')->toArray();
	 // $startingDate = $faker->dateTimeThisYear('+4 month');
  //   $endingDate   = strtotime('+1 Week', $startingDate->getTimestamp());
     // $startingDate = $faker->date;
  // $endingDate  = $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now');
    return [
        'post_id' => $faker->randomElement($name),
        // 'tea_id' => $faker->number,
        // 'title' => $faker->sentence(20),
        'body' => $faker->sentence(20),
        // 'held_at' => $endingDate,
    ];
});


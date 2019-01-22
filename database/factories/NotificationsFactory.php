<?php

use Faker\Generator as Faker;

$factory->define(App\Notification::class, function (Faker $faker) {
	$name=App\User::pluck('id')->toArray();
    return [
        'user_id' => $faker->randomElement($name),
        // 'tea_id' => $faker->number,
        'title' => $faker->sentence(20),
        'body' => $faker->sentence(50),
        
    ];
    
});

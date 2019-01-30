<?php

use Faker\Generator as Faker;

$factory->define(App\Tea_Details::class, function (Faker $faker) {
    $user = App\User::where('role','user')->where('created_by','user')->pluck('id')->toArray();
	$teano=App\Tea::where('user_id',$user)->pluck('tea_no')->toArray();
    // $user_id = App\Tea::whereIn('tea_no',$teano)->pluck('user_id')->toArray();
    $total_as_at_day = App\Tea_Details::where('tea_no',$teano)->latest()->first();
    $gross = $faker->numberBetween($min = 10, $max = 30);
    $net = $gross - 1 ;
    $total =$total_as_at_day->net_weight + $net;
    // $total=$net;
    $startingDate = $faker->date;
    $endingDate  = $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now');
    return [
        // 'user_id' => $faker->randomElement($user),
        // 'tea_id' => $faker->number,
        'tea_no' =>3,
        'receipt_no' => $faker->unique()->numberBetween($min = 1000, $max = 4000),
        'gross_weight' => $gross,
        'net_weight' => $net,
        'total_as_at_day' => $total,
        'date_offered' => $endingDate,
    ];
});

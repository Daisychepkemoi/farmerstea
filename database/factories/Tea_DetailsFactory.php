<?php

use Faker\Generator as Faker;

$factory->define(App\Tea_Details::class, function (Faker $faker) {
    $user = App\User::where('role','user')->where('created_by','user')->where('verifiedadmin','verified')->pluck('id')->toArray();
	$teano=App\Tea::where('tea_no', '!=',null)->pluck('tea_no')->toArray();
    // $user_id = App\Tea::whereIn('tea_no',$teano)->pluck('user_id')->toArray();
    $offered_by = App\User::where('role','admin')->where('function','Agent')->pluck('f_name')->toArray();
    $total_as_at_day = App\Tea_Details::where('tea_no',$teano)->latest()->first();
    $gross = $faker->numberBetween($min = 2, $max = 30);
    $net = $gross-1;
    // $total = $net;
    $total_as_at_day = App\Tea_Details::where('tea_no',$teano)->latest()->first();
    $total=$total_as_at_day->total_as_at_day+$net;
    $startingDate = $faker->date;
    $endingDate  = $faker->dateTimeBetween($startDate = '- 2 months', $endDate = ' - 2 weeks');
    $date= $endingDate->format('dmY');
    $rand=strtoupper(substr(uniqid(sha1(time())), 0,4));
    $receipt_no = $date.$rand;
    return [
        // 'user_id' => $faker->randomElement($user),
        // 'tea_id' => $faker->number,
        'tea_no' =>$faker->randomElement($teano),
        'receipt_no' => $rand,
        'gross_weight' => $gross,
        'net_weight' => $net,
        'total_as_at_day' => $net,
        'offered_by' => $faker->randomElement($offered_by),
        'date_offered' => $endingDate,
    ];
});

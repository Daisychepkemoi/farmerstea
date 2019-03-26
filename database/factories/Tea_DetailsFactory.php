<?php

use Faker\Generator as Faker;

$factory->define(App\Tea_Details::class, function (Faker $faker) {
    $user = App\User::where('role','user')->where('created_by','user')->where('verifiedadmin','verified')->pluck('id')->toArray();
	$teano=App\Tea::where('tea_no', '!=',null)->get();
    $offered_by = App\User::where('role','admin')->where('function','Agent')->pluck('f_name')->toArray();
    $total_as_at_day = App\Tea_Details::where('tea_no',$teano)->latest()->first();
    $gross = $faker->numberBetween($min = 2, $max = 30);
    $net = $gross-1;
    // $total = $net;
    $total_as_at_day = App\Tea_Details::where('tea_no',$teano)->latest()->first();
    $startingDate = $faker->date;
    $endingDate  = $faker->dateTimeBetween($startDate = '- 2 months', $endDate = ' - 1 month');
    $date= $endingDate->format('Ymd');
    $rand=strtoupper(substr(uniqid(sha1(time())), 0,4));
    $receipt_no = $date.$rand;
    foreach($teano as $tea){
            $month = $endingDate->format('Ymd');
            $nmonth = date('m', strtotime($date));
            $total = App\Tea_Details::where('tea_no', $tea->tea_no)->where('created_at', '<', $tea->created_at)->whereMonth('date_offered', $nmonth)->orderBy('created_at', 'desc')->first();
            if ($total == null) {
            $totalday=$net;
            } else {
                $totalday = $total->total_as_at_day + $net;
            }
    return [
        // 'user_id' => $faker->randomElement($user),
        // 'tea_id' => $faker->number,
        'tea_no' =>$tea->tea_no,
        'receipt_no' => $rand,
        'gross_weight' => $gross,
        'net_weight' => $net,
        'total_as_at_day' => $totalday,
        'offered_by' => 'admin',
        'date_offered' => $endingDate,
        'created_at' =>$endingDate,
    ];
}
});

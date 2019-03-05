




     <?php

use Faker\Generator as Faker;

$factory->define(App\Notification::class, function (Faker $faker) {
	$name=App\User::pluck('id')->toArray();
		$user_id=App\User::where('role','admin')->where('function','user')->pluck('id')->toArray();

    return [
        'user_id' => $faker->randomElement($user_id),
        // 'tea_id' => $faker->number,
        'title' => $faker->sentence(20),
        'body' => $faker->sentence(50),
        
    ];
    
});


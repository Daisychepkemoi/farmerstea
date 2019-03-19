<?php
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;



$factory->define(App\Posts::class, function (Faker $faker) {
		$user = User::where('role','admin')->pluck('f_name','l_name')->toArray();
	return [
		'body' => $faker->paragraph(2),
		'title' => $faker->sentence(50),
		'created_by' =>$faker->randomElement($user),
		
		'image' => $faker->image('public/uploads',400,300, null, false)

	];
    
});

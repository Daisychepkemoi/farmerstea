<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;



$factory->define(App\Posts::class, function (Faker $faker) {
	// $filePath = storage_path('/images');
	return [
		'body' => $faker->paragraph(2),
		// 'image' => $faker->imageUrl(400, 300),
		// 'image' => $faker->image('/uploads',400,300)
		'image' => $faker->image('public/uploads',400,300, null, false)

	];
    
});

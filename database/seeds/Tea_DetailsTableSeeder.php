<?php

use Illuminate\Database\Seeder;

class Tea_DetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Tea_Details::class, 5)->create();
    }
}
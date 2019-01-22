<?php

use Illuminate\Database\Seeder;

class TeasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Tea::class, 120)->create();
    }
}

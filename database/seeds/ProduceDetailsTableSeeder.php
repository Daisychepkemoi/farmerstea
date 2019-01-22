<?php

use Illuminate\Database\Seeder;

class ProduceDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ProduceDetail::class, 20)->create();
    }
}

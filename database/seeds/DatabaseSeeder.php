<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TeasTableSeeder::class);
        // $this->call(ProduceDetailsTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(NotificationsTableSeeder::class);
    }
}

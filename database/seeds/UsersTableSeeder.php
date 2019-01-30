<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $admin = factory(\App\User::class)->create([
         	'f_name' => 'daisy',
         	'l_name' => 'memo',
         	'national_id' => '14595269',
         	'phone_no' => '888056896',
            'email' => 'daisy@email.com',
            'role' => 'user',
            'password' => Hash::make('123456'),
        ]);
         $users=factory(App\User::class, 30)->create();
    
    }
}

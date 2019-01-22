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
        //  $admin = factory(\App\User::class)->create([
        //  	'f_name' => 'daisy',
        //  	'l_name' => 'memo',
        //  	'national_id' => '33664897',
        //  	'phone_no' => '740808044',
        //     'email' => 'daisy@example.com',
        //     // 'name' => 'daisy',
        //     'role' => 'admin',
        //     'password' => Hash::make('123456'),
        // ]);
         $users=factory(App\User::class, 30)->create();
    
    }
}

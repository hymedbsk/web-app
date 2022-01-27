<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
        [
            'name' => 'Admin',
            'firstname' => 'Admin',
            'email' => 'hymedboussaklatan@gmail.com',
            'password' => bcrypt('123456aze'),
            'admin' => '1'
        ],
    ]);
    }
}

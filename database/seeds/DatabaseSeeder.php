<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => 'dangviet@gmail.com',
            'password' => bcrypt('123123'),
            'phonenumber' => str_random(10),
            'address' => str_random(20),
            'role' => 0,
            'avatar' => str_random(10),
            'created_at' => '2018/01/01',
            'updated_at' => '2018/01/02',
            'deleted_at' => str_random(10),
            'remember_token' => bcrypt('123123'),
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Add exceptional user
        DB::table('users')->insert([
            'name'      => 'Super User',
            'email'     => 'su@superuser.com',
            'password'  => bcrypt('iamyou123'),
            'profile'   => ''
        ]);

        DB::table('users')->insert([
            'name'      => 'Owner',
            'email'     => 'owner@crotontravel.com',
            'password'  => bcrypt('owner123'),
            'profile'   => ''
        ]);
    }
}

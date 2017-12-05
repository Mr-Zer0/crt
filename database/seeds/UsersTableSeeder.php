<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = array_flatten(Permission::all(['name'])->toArray());

        // Add exceptional user
        DB::table('users')->insert([
            'name'      => 'Super User',
            'email'     => 'su@superuser.com',
            'password'  => bcrypt('iamyou123'),
            'profile'   => ''
        ]);

        (\App\User::find(1))->givePermissionTo($permissions);

        $ht = DB::table('users')->insert([
            'name'      => 'Hein Thant',
            'email'     => 'hein@crotontravel.com',
            'password'  => bcrypt('hein123'),
            'profile'   => ''
        ]);

        (\App\User::find(2))->givePermissionTo($permissions);
    }
}

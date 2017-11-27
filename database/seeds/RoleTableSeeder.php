<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');

        Role::create(['name' => 'sudo']);

        Role::create(['name' => 'Top Level Management']);

        $super = App\User::where('email', 'su@superuser.com')->first();
        $super->assignRole('sudo');

        $user = App\User::where('email', 'owner@crotontravel.com')->first();
        $user->assignRole('Top Level Management');
    }
}

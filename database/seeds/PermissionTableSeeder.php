<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $abilities = [
            'retrieve users',
            'view users',
            'create users',
            'update users',
            'delete users',

            'retrieve roles',
            'view roles',
            'create roles',
            'update roles',
            'delete roles',

            'manage settings'
        ];

        foreach ($abilities as $ability)
        {
            Permission::create(['name' => $ability]);
        }
    }
}

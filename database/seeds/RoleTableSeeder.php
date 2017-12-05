<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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

        $admin = Role::create(['name' => 'System Admins']);
        $admin->givePermissionTo(array_flatten(Permission::all(['name'])->toArray()));

        $tour = Role::create(['name' => 'Tours']);
        $tour->givePermissionTo(array_flatten(Permission::where('name', 'LIKE', '%tours')->get(['name'])->toArray()));
    }
}

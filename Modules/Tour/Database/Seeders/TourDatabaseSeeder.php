<?php

namespace Modules\Tour\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class TourDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->seedPermission();

        // $this->call("OthersTableSeeder");
    }

    protected function seedPermission()
    {
        $permissions = [
            'retrieve tours',
            'view tours',
            'create tours',
            'update tours',
            'delete tours',
        ];

        foreach ($permissions as $permission)
        {
            Permission::create(['name' => $permission]);
        }

        $su = \App\User::where('email', 'su@superuser.com')->first();
        $su->givePermissionTo($permissions);
    }
}

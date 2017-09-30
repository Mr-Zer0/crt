<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $su = Role::create([
            'name'          => 'Super User',
            'slug'          => 'su',
            'description'   => 'This role is for application owner',
            'permissions'   => [
                'code-create'    => true,
                'code-update'    => true,
                'code-delete'    => true,
            ]
        ]);

        $sa = Role::create([
            'name'          => 'System Administrator',
            'slug'          => 'sa',
            'description'   => 'This role can main the whole application.',
            'permissions'   => [
                'code-create'    => true,
                'code-update'    => true,
                'code-delete'    => true,
            ]
        ]);

        $admin = Role::create([
            'name'          => 'Administrator',
            'slug'          => 'administrator',
            'description'   => 'This role authorizes all actions except from system maintainance.',
            'permissions' => [
                'code-create'    => true,
                'code-update'    => true,
                'code-delete'    => true,
            ]
        ]);

        $editor = Role::create([
            'name' => 'Editor',
            'slug' => 'editor',
            'description'   => "This role has no access to user roles and system maintainance.",
            'permissions' => [
                'code-update' => true,
            ]
        ]);

        $moderator = Role::create([
            'name' => 'Moderator',
            'slug' => 'moderator',
            'description'   => "This role has no access to user, user roles and system maintainance.",
            'permissions' => [
                'code-update' => true,
            ]
        ]);

        $contributor = Role::create([
            'name' => 'Contributor',
            'slug' => 'contributor',
            'description'   => "This role has only access to the specific works or tasks.",
            'permissions' => [
                'code-update' => true,
            ]
        ]);

        $member = Role::create([
            'name' => 'Member',
            'slug' => 'member',
            'description'   => "This role can only view the specific work or tasks.",
            'permissions' => [
                
            ]
        ]);
    }
}

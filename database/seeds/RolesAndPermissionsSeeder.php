<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Define permissions
        $permissions = [
            'admin' => [
                'generic' => [
                    'create resources' => 'enables admin to create resources',
                    'edit resources' => 'enables admin to edit resources',
                    'delete resources' => 'enables admin to delete resources',
                ],
                'admins' => [
                    'create admins' => 'enables admin to create admins',
                    'view any admin' => 'enables admin to view any admin',
                    'view admins' => 'enables admin to view admins',
                    'edit admins' => 'enables admin to edit admins',
                    'delete admins' => 'enables admin to delete admins',
                ],
                'shop' => [
                    'verify shops' => 'enable user to review and verify organizations'
                ],
                'users' => [
                    'view any user' => 'enables admin to view any user',
                    'view users' => 'enables admin to view users',
                    'edit user' => "enables admin to edit users",
                    'delete users' => 'enables admin to delete users',
                ],
                'support' => [
                    'create support' => 'enables admin to create support',
                ],
            ],
            'seller' => [
                'generic' => [
                    'create resources' => 'enables seller to create resources',
                    'edit resources' => 'enables seller to edit resources',
                    'delete resources' => 'enables seller to delete resources',
                ],
                'users' => [
                    'create users' => 'enables seller to create user',
                    'view any user' => 'enables seller to view any user',
                    'view users' => 'enables seller to view users',
                    'edit user' => "enables seller to edit users",
                    'delete users' => 'enables seller to delete users',
                ],
                'roles' => [
                    'create roles' => 'enables user to create roles',
                    'view any role' => 'enables user to view any role',
                    'view roles' => 'enables user to view roles',
                    'edit roles' => 'enables user to edit roles',
                    'delete roles' => 'enables user to delete roles',
                ],
            ]
        ];

        // Create permissions
        foreach ($permissions as $guardName => $groups) {
            foreach ($groups as $groupName => $names) {
                foreach ($names as $name => $description) {
                    $permission = new Permission();
                    $permission->name = $name;
                    $permission->description = $description;
                    $permission->group_name = $groupName;
                    $permission->guard_name = $guardName;
                    $permission->save();
                }
            }
        }
    }
}
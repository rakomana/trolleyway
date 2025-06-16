<?php

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Enums\Role as EnumRole;
use Illuminate\Support\Str;
use App\Enums\GuardNames;
use App\Models\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $generatedPassword = Str::random(8);

        $admin = new Admin();
        $admin->name = 'prince';
        $admin->email = 'prince@princesolutions.co.za';
        $admin->password = Hash::make($generatedPassword); 
        $admin->save();

        //Create primary admin of the shop
        $role = new Role();
        $role->name = EnumRole::PrimaryAdmin;
        $role->guard_name = GuardNames::Admin;
        $role->save();

        // Attach all [admin] permissions to the role
        $permissions = Permission::where('guard_name', GuardNames::Admin)->get();
        $role->syncPermissions($permissions);

        // Attach the user to the role
        $admin->assignRole($role);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list companies']);
        Permission::create(['name' => 'view companies']);
        Permission::create(['name' => 'create companies']);
        Permission::create(['name' => 'update companies']);
        Permission::create(['name' => 'delete companies']);

        Permission::create(['name' => 'list inspectorreports']);
        Permission::create(['name' => 'view inspectorreports']);
        Permission::create(['name' => 'create inspectorreports']);
        Permission::create(['name' => 'update inspectorreports']);
        Permission::create(['name' => 'delete inspectorreports']);

        Permission::create(['name' => 'list leads']);
        Permission::create(['name' => 'view leads']);
        Permission::create(['name' => 'create leads']);
        Permission::create(['name' => 'update leads']);
        Permission::create(['name' => 'delete leads']);

        Permission::create(['name' => 'list marketingactivities']);
        Permission::create(['name' => 'view marketingactivities']);
        Permission::create(['name' => 'create marketingactivities']);
        Permission::create(['name' => 'update marketingactivities']);
        Permission::create(['name' => 'delete marketingactivities']);

        Permission::create(['name' => 'list potentials']);
        Permission::create(['name' => 'view potentials']);
        Permission::create(['name' => 'create potentials']);
        Permission::create(['name' => 'update potentials']);
        Permission::create(['name' => 'delete potentials']);

        Permission::create(['name' => 'list toolcategories']);
        Permission::create(['name' => 'view toolcategories']);
        Permission::create(['name' => 'create toolcategories']);
        Permission::create(['name' => 'update toolcategories']);
        Permission::create(['name' => 'delete toolcategories']);

        Permission::create(['name' => 'list toolinventories']);
        Permission::create(['name' => 'view toolinventories']);
        Permission::create(['name' => 'create toolinventories']);
        Permission::create(['name' => 'update toolinventories']);
        Permission::create(['name' => 'delete toolinventories']);

        Permission::create(['name' => 'list toolloans']);
        Permission::create(['name' => 'view toolloans']);
        Permission::create(['name' => 'create toolloans']);
        Permission::create(['name' => 'update toolloans']);
        Permission::create(['name' => 'delete toolloans']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}

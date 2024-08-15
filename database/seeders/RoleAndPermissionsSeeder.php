<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'create company']);
        Permission::create(['name' => 'read company']);
        Permission::create(['name' => 'update company']);
        Permission::create(['name' => 'delete company']);

        Permission::create(['name' => 'create employee']);
        Permission::create(['name' => 'read employee']);
        Permission::create(['name' => 'update employee']);
        Permission::create(['name' => 'delete employee']);

        Role::create(['name' => 'admin'])->givePermissionTo(Permission::all());
    }
}

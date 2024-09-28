<?php

namespace Modules\Auth\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'add teacher',
            'delete teacher',
            'manage student enrollment',
            'manage permissions',
            'add admins',
            'manage courses',
            'manage subjects'
        ];
        foreach ($permissions as $permission) {
            Permission::create(['guard_name' => 'admin','name' => $permission]);
        };
        $superAdmin = Role::create(['guard_name' => 'admin','name' => 'super admin']);
        $admin = Role::create(['guard_name' => 'admin','name' => 'admin']);
        $employee = Role::create(['guard_name' => 'admin','name' => 'employee']);

        // Assign permissions to roles
        $superAdmin->givePermissionTo(Permission::all());
        $admin->givePermissionTo(['add teacher', 'delete teacher', 'manage courses', 'manage subjects']);
        $employee->givePermissionTo('manage student enrollment');
    }

       
    }


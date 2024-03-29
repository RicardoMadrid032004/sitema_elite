<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::create(['name' => 'admin']);
        $role_personal = Role::create(['name' => 'personal']);
        $role_estudiante = Role::create(['name' => 'estudiante']);

        $permission_create_user = Permission::create(['name' => 'create user']);
        $permission_read_user = Permission::create(['name' => 'read user']);
        $permission_update_user = Permission::create(['name' => 'update user']);
        $permission_delete_user = Permission::create(['name' => 'delete user']);


        $permission_create_role = Permission::create(['name' => 'create roles']);
        $permission_read_role = Permission::create(['name' => 'read roles']);
        $permission_update_role = Permission::create(['name' => 'update roles']);
        $permission_delete_role = Permission::create(['name' => 'delete roles']);

        $permission_create_banca = Permission::create(['name' => 'create banca']);
        $permission_read_banca = Permission::create(['name' => 'read banca']);
        $permission_update_banca = Permission::create(['name' => 'update banca']);
        $permission_delete_banca = Permission::create(['name' => 'delete banca']);

        $permission_create_separata = Permission::create(['name' => 'create separata']);
        $permission_read_separata = Permission::create(['name' => 'read separata']);
        $permission_update_separata = Permission::create(['name' => 'update separata']);
        $permission_delete_separata = Permission::create(['name' => 'delete separata']);

        $permissions_admin = [$permission_create_role, $permission_read_role, $permission_update_role, $permission_delete_role,
                            $permission_create_banca, $permission_read_banca, $permission_update_banca, $permission_delete_banca,
                            $permission_create_separata, $permission_read_separata, $permission_update_separata, $permission_delete_separata,
                            $permission_create_user, $permission_read_user, $permission_update_user, $permission_delete_user];
        
        $permissions_personal = [$permission_create_banca, $permission_read_banca, $permission_update_banca, $permission_delete_banca,
                                $permission_create_separata, $permission_read_separata, $permission_update_separata, $permission_delete_separata];

        $permissions_estudiante = [$permission_create_banca, $permission_read_banca, $permission_update_banca, $permission_delete_banca,
                                   $permission_create_separata, $permission_read_separata, $permission_update_separata, $permission_delete_separata ];

        $role_admin->syncPermissions($permissions_admin);
        $role_personal->syncPermissions($permissions_personal);
        $role_estudiante->syncPermissions($permissions_estudiante);

        // listar a un usuario solo un permiso en especifico
        // $role_estudainte->givePermissionTo($permission_update_category);
    }
}

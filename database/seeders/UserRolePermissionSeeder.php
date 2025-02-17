<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permisos = [
            'Usuarios Listar',
            'Usuarios Crear',
            'Usuarios Ver',
            'Usuarios Editar',
            'Usuarios Eliminar',

            'Roles Listar',
            'Roles Crear',
            'Roles Ver',
            'Roles Editar',
            'Roles Eliminar',

            'Permisos Listar',
            'Permisos Crear',
            'Permisos Ver',
            'Permisos Editar',
            'Permisos Eliminar',

        ];

        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso]);
        }

        // CREAR USUARIO ADMINISTRADOR
        $user = User::create([
            'name' => 'Ronald Alexis Niz Nuñez',
            'email' => 'ronaldalexisniznunez@gmail.com',
            'nickname' => 'ronald.niz',
            'password' => Hash::make('Rann2006')
        ]);

         // CREAR ROL "ADMIN"
         $role = Role::create(['name' => 'SuperAdmin']);

         // ASIGNAR TODOS LOS PERMISOS CREADOS AL ROL "SuperAdmin"
        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}

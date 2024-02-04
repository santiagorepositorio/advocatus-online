<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'Admin']);
        $role->syncPermissions(['Crear cursos', 'Listar cursos', 'Editar cursos', 'Eliminar cursos', 'Crear roles', 'Listar roles', 'Editar roles', 'Eliminar roles']);
        $role2 = Role::create(['name' => 'Instructor']);
        $role2->syncPermissions(['Crear cursos', 'Listar cursos', 'Editar cursos', 'Eliminar cursos']);
    }
}

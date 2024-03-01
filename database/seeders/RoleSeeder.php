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
        $role = Role::create(['name' => 'SuperAdmin']);
        $role = Role::create(['name' => 'Admin']);
        $role->syncPermissions(['Crear cursos', 'Listar cursos', 'Editar cursos', 'Eliminar cursos', 'Eliminar users', 'Crear roles', 'Listar roles', 'Editar roles', 'Eliminar roles', 'Crear categories', 'Listar categories', 'Editar categories', 'Eliminar categories', 'Listar users', 'Editar users', 'Listar publicados', 'Gestionar publicados', 'Listar pendientes', 'Validar Pendientes', 'Chat whatsapp', 'Envio masivo']);
        $role2 = Role::create(['name' => 'Instructor']);
        $role2->syncPermissions(['Crear cursos', 'Listar cursos', 'Editar cursos', 'Eliminar cursos']);
        $role2 = Role::create(['name' => 'Administrativo']);
        $role2->syncPermissions(['Listar publicados', 'Gestionar publicados', 'Listar pendientes', 'Validar Pendientes', 'Chat whatsapp', 'Envio masivo']);
    }
}

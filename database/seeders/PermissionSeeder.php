<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'admin.home'
        ]);
        Permission::create([
            'name' => 'Crear cursos'
        ]);
        Permission::create([
            'name' => 'Listar cursos'
        ]);
        Permission::create([
            'name' => 'Editar cursos'
        ]);
        Permission::create([
            'name' => 'Eliminar cursos'
        ]);

        Permission::create([
            'name' => 'Crear roles'
        ]);
        Permission::create([
            'name' => 'Listar roles'
        ]);
        Permission::create([
            'name' => 'Editar roles'
        ]);
        Permission::create([
            'name' => 'Eliminar roles'
        ]);

        Permission::create([
            'name' => 'Crear categories'
        ]);
        Permission::create([
            'name' => 'Listar categories'
        ]);
        Permission::create([
            'name' => 'Editar categories'
        ]);
        Permission::create([
            'name' => 'Eliminar categories'
        ]);

        Permission::create([
            'name' => 'Listar users'
        ]);
        Permission::create([
            'name' => 'Editar users'
        ]);
        Permission::create([
            'name' => 'Eliminar users'
        ]);

        
        Permission::create([
            'name' => 'Listar publicados'
        ]);
        Permission::create([
            'name' => 'Gestionar publicados'
        ]);

        Permission::create([
            'name' => 'Listar pendientes'
        ]);
        Permission::create([
            'name' => 'Validar Pendientes'
        ]);

        Permission::create([
            'name' => 'Chat whatsapp'
        ]);
        Permission::create([
            'name' => 'Envio masivo'
        ]);
        

        
        
       



    }
}

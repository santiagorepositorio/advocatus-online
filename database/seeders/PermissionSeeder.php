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

        
        
       



    }
}

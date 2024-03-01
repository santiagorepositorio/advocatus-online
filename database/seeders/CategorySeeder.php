<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Abogado',
            'slug' => Str::slug('Abogado', '-'),
            'status' => 'Perfil'
        ]);
        Category::create([
            'name' => 'Estudio Juridico',
            'slug' => Str::slug('Estudio Juridico', '-'),
            'status' => 'Perfil'
        ]);
        Category::create([
            'name' => 'Asociacion',
            'slug' => Str::slug('Asociacion', '-'),
            'status' => 'Perfil'
        ]);
        Category::create([
            'name' => 'Docente',
            'slug' => Str::slug('Docente', '-'),
            'status' => 'Perfil'
        ]);


        //cursos

        Category::create([
            'name' => 'Diseno Web',
            'slug' => Str::slug('Diseno Web', '-'),
            'status' => 'Curso'
        ]);
        Category::create([
            'name' => 'Sistemas Web',
            'slug' => Str::slug('Sistemas Web', '-'),
            'status' => 'Curso'
        ]);
        Category::create([
            'name' => 'Proceso Familiar',
            'slug' => Str::slug('Proceso Familiar', '-'),
            'status' => 'Curso'
        ]);
        Category::create([
            'name' => 'Derecho Laboral',
            'slug' => Str::slug('Derecho Laboral', '-'),
            'status' => 'Curso'
        ]);
        Category::create([
            'name' => 'Temas Juridicos',
            'slug' => Str::slug('Temas Juridicos', '-'),
            'status' => 'Blog'
        ]);
        Category::create([
            'name' => 'Legal Tech',
            'slug' => Str::slug('Legal Tech', '-'),
            'status' => 'Blog'
        ]);
        Category::create([
            'name' => 'Argumentacion Juridica',
            'slug' => Str::slug('Argumentacion Juridica', '-'),
            'status' => 'Blog'
        ]);
    }
}

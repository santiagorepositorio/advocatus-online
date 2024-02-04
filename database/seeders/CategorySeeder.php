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
            'status' => 'Abogados'
        ]);
        Category::create([
            'name' => 'Estudio Juridico',
            'slug' => Str::slug('Estudio Juridico', '-'),
            'status' => 'Abogados'
        ]);
        Category::create([
            'name' => 'Asociacion',
            'slug' => Str::slug('Asociacion', '-'),
            'status' => 'Abogados'
        ]);
        Category::create([
            'name' => 'Docente',
            'slug' => Str::slug('Docente', '-'),
            'status' => 'Abogados'
        ]);


        //cursos

        Category::create([
            'name' => 'Diseno Web',
            'slug' => Str::slug('Diseno Web', '-'),
            'status' => 'cursos'
        ]);
        Category::create([
            'name' => 'Sistemas Web',
            'slug' => Str::slug('Sistemas Web', '-'),
            'status' => 'cursos'
        ]);
        Category::create([
            'name' => 'Proceso Familiar',
            'slug' => Str::slug('Proceso Familiar', '-'),
            'status' => 'cursos'
        ]);
        Category::create([
            'name' => 'Derecho Laboral',
            'slug' => Str::slug('Derecho Laboral', '-'),
            'status' => 'cursos'
        ]);
        Category::create([
            'name' => 'Temas Juridicos',
            'slug' => Str::slug('Temas Juridicos', '-'),
            'status' => 'blog'
        ]);
        Category::create([
            'name' => 'Legal Tech',
            'slug' => Str::slug('Legal Tech', '-'),
            'status' => 'blog'
        ]);
        Category::create([
            'name' => 'Argumentacion Juridica',
            'slug' => Str::slug('Argumentacion Juridica', '-'),
            'status' => 'blog'
        ]);
    }
}

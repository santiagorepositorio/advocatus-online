<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $tags = $tags = ['divorcio', 'laboral', 'penal', 'civil', 'mercantil', 'fiscal', 'constitucional', 'administrativo', 'internacional', 'familia', 'derechos_humanos', 'propiedad_intelectual', 'contratos', 'responsabilidad_civil', 'derecho_ambiental', 'derecho_bancario', 'seguridad_social', 'derecho_de_la_competencia', 'derecho_procesal', 'derecho_laboral', 'autismo', 'legaltech'];       

        foreach ($tags as $tag) {
            \App\Models\Tag::create([
                'name' => $tag,
                'color' => $faker->randomElement(['amber', 'yellow', 'lime', 'purple', 'pink']),
            ]);
        }

       
    }
}

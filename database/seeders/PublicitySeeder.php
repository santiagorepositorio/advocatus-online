<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Publicity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublicitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Publicity::create([
            'title' => 'Libros de Derecho',
            'description' => 'libreria juridica en toda su variedad',
            'link' => 'https://www.facebook.com/profile.php?id=100068228293579'
        ]);
        Image::create([
            'url' => 'images/publicity/7855754.png',
            'imageable_id' => 1,
            'imageable_type' => 'App\Models\Publicity'
        ]);
        Publicity::create([
            'title' => 'Venta de Autos',
            'description' => 'Feria de la Plaza la Paz',
            'link' => 'https://www.facebook.com/profile.php?id=100068228293579'
        ]);
        Image::create([
            'url' => 'images/publicity/banner-publi.jpg',
            'imageable_id' => 2,
            'imageable_type' => 'App\Models\Publicity'
        ]);
        Publicity::create([
            'title' => 'Evento de Tesis en La Paz',
            'description' => 'UMSA la mejor en investigacion',
            'link' => 'https://www.facebook.com/profile.php?id=100068228293579'
        ]);
        Image::create([
            'url' => 'images/publicity/bannerpublicity.png',
            'imageable_id' => 3,
            'imageable_type' => 'App\Models\Publicity'
        ]);
    }
}

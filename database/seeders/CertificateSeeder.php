<?php

namespace Database\Seeders;

use App\Models\Certificate;
use App\Models\Course;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $certificates = Certificate::factory(5)->create();

        foreach ($certificates as $certificate) {
           
            Image::factory(1)->create([
                'imageable_id' => $certificate->id,
                'imageable_type' => 'App\Models\Certificate',
               
            ]);

        }
    }
}

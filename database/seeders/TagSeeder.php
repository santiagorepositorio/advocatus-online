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
        $tags = ['laravel', 'vue', 'react', 'divorcio', 'laboral'];       

        foreach ($tags as $tag) {
            \App\Models\Tag::create([
                'name' => $tag,
                'color' => $faker->randomElement(['amber', 'yellow', 'lime', 'purple', 'pink']),
            ]);
        }

       
    }
}

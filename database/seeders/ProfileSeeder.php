<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profiles = Profile::create([
            'city' => 'La Paz',
            'state' => 'Bolivia',
            'about' => 'Soy Santiago Boris Quispe Apaza, Ingeniero de Sistemas y Licenciado en Derecho, experimentado en el campo de Community Manager y Customer Relationship Management basado en el desarrollo de Sistemas Web y Móviles, con ímpetu ante el trabajo bajo presión en equipo o individual, autocritico en términos de aprendizaje en un nuevo campo laborar y apasionado por los retos. Me gusta apoyar en los Proyectos de Grado y ahora Tesis. ',
            'name' => 'Santiago Boris Quispe Apaza',
            'slug' => Str::slug('Santiago Boris Quispe Apaza'),
            'rpa' => '6028777SBQA',
            'nit' => '6028514015',
            'phone' => '77778837',
            'email' => 'santiago.boris.q.a@sobotredsystems.com',           
            'latitude' => '-16.51974875529',
            'longitude' => '-68.16909313201',
            'status' => 3,
            'user_id' => 1,
            'category_id' => 1
        ]);


        $faker = Faker::create();
        Image::create([
            'url' => 'profiles/' . $faker->image('public/storage/profiles', 1640, 624,  null, false),
            'imageable_id' => 1,
            'imageable_type' => 'App\Models\Profile'
        ]);
        $profiles = Profile::create([
            'city' => 'La Paz',
            'state' => 'Bolivia',
            'about' => 'Soy Santiago Boris Quispe Apaza, Ingeniero de Sistemas y Licenciado en Derecho, experimentado en el campo de Community Manager y Customer Relationship Management basado en el desarrollo de Sistemas Web y Móviles, con ímpetu ante el trabajo bajo presión en equipo o individual, autocritico en términos de aprendizaje en un nuevo campo laborar y apasionado por los retos. Me gusta apoyar en los Proyectos de Grado y ahora Tesis. ',
            'name' => 'Juan Alberto Domincano',
            'slug' => Str::slug('Juan Alberto Domincano'),
            'rpa' => '6028777SBQA',
            'nit' => '6028514015',
            'phone' => '77778837',
            'email' => 'santiago.boris.q.a@sobotredsystems.com',           
            'latitude' => '-16.51974875529',
            'longitude' => '-68.16909313201',
            'status' => 3,
            'user_id' => 2,
            'category_id' => 1
        ]);


        $faker = Faker::create();
        Image::create([
            'url' => 'profiles/' . $faker->image('public/storage/profiles', 1640, 624,  null, false),
            'imageable_id' => 2,
            'imageable_type' => 'App\Models\Profile'
        ]);
        $profiles = Profile::create([
            'city' => 'La Paz',
            'state' => 'Bolivia',
            'about' => 'Soy Santiago Boris Quispe Apaza, Ingeniero de Sistemas y Licenciado en Derecho, experimentado en el campo de Community Manager y Customer Relationship Management basado en el desarrollo de Sistemas Web y Móviles, con ímpetu ante el trabajo bajo presión en equipo o individual, autocritico en términos de aprendizaje en un nuevo campo laborar y apasionado por los retos. Me gusta apoyar en los Proyectos de Grado y ahora Tesis. ',
            'name' => 'molli saca juvenal',
            'slug' => Str::slug('molli saca juvenal'),
            'rpa' => '6028777SBQA',
            'nit' => '6028514015',
            'phone' => '77778837',
            'email' => 'santiago.boris.q.a@sobotredsystems.com',           
            'latitude' => '-16.51974875529',
            'longitude' => '-68.16909313201',
            'status' => 3,
            'user_id' => 3,
            'category_id' => 1
        ]);


        $faker = Faker::create();
        Image::create([
            'url' => 'profiles/' . $faker->image('public/storage/profiles', 1640, 624, null, false),
            'imageable_id' => 3,
            'imageable_type' => 'App\Models\Profile'
        ]);
        $profiles = Profile::create([
            'city' => 'La Paz',
            'state' => 'Bolivia',
            'about' => 'Soy Santiago Boris Quispe Apaza, Ingeniero de Sistemas y Licenciado en Derecho, experimentado en el campo de Community Manager y Customer Relationship Management basado en el desarrollo de Sistemas Web y Móviles, con ímpetu ante el trabajo bajo presión en equipo o individual, autocritico en términos de aprendizaje en un nuevo campo laborar y apasionado por los retos. Me gusta apoyar en los Proyectos de Grado y ahora Tesis. ',
            'name' => 'Carlos Alan Mamani',
            'slug' => Str::slug('Carlos Alan Mamani'),
            'rpa' => '6028777SBQA',
            'nit' => '6028514015',
            'phone' => '77778837',
            'email' => 'santiago.boris.q.a@sobotredsystems.com',           
            'latitude' => '-16.51974875529',
            'longitude' => '-68.16909313201',
            'status' => 3,
            'user_id' => 4,
            'category_id' => 1
        ]);


        $faker = Faker::create();
        Image::create([
            'url' => 'profiles/' . $faker->image('public/storage/profiles', 1640, 624,  null, false),
            'imageable_id' => 4,
            'imageable_type' => 'App\Models\Profile'
        ]);
        $profiles = Profile::create([
            'city' => 'La Paz',
            'state' => 'Bolivia',
            'about' => 'Soy Santiago Boris Quispe Apaza, Ingeniero de Sistemas y Licenciado en Derecho, experimentado en el campo de Community Manager y Customer Relationship Management basado en el desarrollo de Sistemas Web y Móviles, con ímpetu ante el trabajo bajo presión en equipo o individual, autocritico en términos de aprendizaje en un nuevo campo laborar y apasionado por los retos. Me gusta apoyar en los Proyectos de Grado y ahora Tesis. ',
            'name' => 'Marco Teodocio Duran',
            'slug' => Str::slug('Marco Teodocio Duran'),
            'rpa' => '6028777SBQA',
            'nit' => '6028514015',
            'phone' => '77778837',
            'email' => 'santiago.boris.q.a@sobotredsystems.com',           
            'latitude' => '-16.51974875529',
            'longitude' => '-68.16909313201',
            'status' => 3,
            'user_id' => 5,
            'category_id' => 1
        ]);


        $faker = Faker::create();
        Image::create([
            'url' => 'profiles/' . $faker->image('public/storage/profiles', 1640, 624, null, false),
            'imageable_id' => 5,
            'imageable_type' => 'App\Models\Profile'
        ]);
        $profiles = Profile::create([
            'city' => 'La Paz',
            'state' => 'Bolivia',
            'about' => 'Soy Santiago Boris Quispe Apaza, Ingeniero de Sistemas y Licenciado en Derecho, experimentado en el campo de Community Manager y Customer Relationship Management basado en el desarrollo de Sistemas Web y Móviles, con ímpetu ante el trabajo bajo presión en equipo o individual, autocritico en términos de aprendizaje en un nuevo campo laborar y apasionado por los retos. Me gusta apoyar en los Proyectos de Grado y ahora Tesis. ',
            'name' => 'Elvin Rigo Ticona',
            'slug' => Str::slug('Elvin Rigo Ticona'),
            'rpa' => '6028777SBQA',
            'nit' => '6028514015',
            'phone' => '77778837',
            'email' => 'santiago.boris.q.a@sobotredsystems.com',           
            'latitude' => '-16.51974875529',
            'longitude' => '-68.16909313201',
            'status' => 3,
            'user_id' => 6,
            'category_id' => 1
        ]);


        $faker = Faker::create();
        Image::create([
            'url' => 'profiles/' . $faker->image('public/storage/profiles', 1640, 624,  null, false),
            'imageable_id' => 6,
            'imageable_type' => 'App\Models\Profile'
        ]);
        $profiles = Profile::create([
            'city' => 'La Paz',
            'state' => 'Bolivia',
            'about' => 'Soy Santiago Boris Quispe Apaza, Ingeniero de Sistemas y Licenciado en Derecho, experimentado en el campo de Community Manager y Customer Relationship Management basado en el desarrollo de Sistemas Web y Móviles, con ímpetu ante el trabajo bajo presión en equipo o individual, autocritico en términos de aprendizaje en un nuevo campo laborar y apasionado por los retos. Me gusta apoyar en los Proyectos de Grado y ahora Tesis. ',
            'name' => 'Rodrigo Carlao Venavides',
            'slug' => Str::slug('Rodrigo Carlao Venavides'),
            'rpa' => '6028777SBQA',
            'nit' => '6028514015',
            'phone' => '77778837',
            'email' => 'santiago.boris.q.a@sobotredsystems.com',           
            'latitude' => '-16.51974875529',
            'longitude' => '-68.16909313201',
            'status' => 3,
            'user_id' => 7,
            'category_id' => 1
        ]);


        $faker = Faker::create();
        Image::create([
            'url' => 'profiles/' . $faker->image('public/storage/profiles', 1640, 624,  null, false),
            'imageable_id' => 7,
            'imageable_type' => 'App\Models\Profile'
        ]);
    }
}

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
            'about' => 'Soy Santiago Boris Quispe Apaza, estudiante de Derecho y Analista de Sistemas experimentado en el campo de Community Manager y Customer Relationship Management basado en el desarrollo de Sistemas Web y Móviles, con ímpetu ante el trabajo bajo presión en equipo o individual, autocritico en términos de aprendizaje en un nuevo campo laborar y apasionado por los retos. Me gusta apoyar en los Proyectos de Grado y ahora Tesis. ',
            'name' => 'Santiago Boris Quispe Apaza',
            'email' => 'sobotred.systems@gmail.com',
            'date' => '12/12/2023',
            'rpa' => '6028777SBQA',
            'nit' => '6028514015',
            'phone' => '77778837',
            'iframe' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15299.547783535572!2d-68.1491348!3d-16.5318042!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915edfd144114483%3A0xeacc8231fee08d6e!2sSobotred%20Systems!5e0!3m2!1ses-419!2sbo!4v1679447210130!5m2!1ses-419!2sbo"
                width="600" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',

            'status' => 3,
            'slug' => Str::slug('Santiago Boris Quispe Apaza'),
            'user_id' => 1,
            'category_id' => 1
        ]);


        $faker = Faker::create();
        Image::create([
            'url' => 'profiles/' . $faker->image('public/storage/profiles', 1920, 1080,  null, false),
            'imageable_id' => 1,
            'imageable_type' => 'App\Models\Profile'
        ]);
        $profiles = Profile::create([
            'city' => 'La Paz',
            'state' => 'Bolivia',
            'about' => 'Soy Santiago Boris Quispe Apaza, estudiante de Derecho y Analista de Sistemas experimentado en el campo de Community Manager y Customer Relationship Management basado en el desarrollo de Sistemas Web y Móviles, con ímpetu ante el trabajo bajo presión en equipo o individual, autocritico en términos de aprendizaje en un nuevo campo laborar y apasionado por los retos. Me gusta apoyar en los Proyectos de Grado y ahora Tesis. ',
            'name' => 'Elvin Listo',
            'email' => 'elvin.listo@gmail.com',
            'date' => '12/12/2023',
            'rpa' => '6028777SBQA',
            'nit' => '6028514015',
            'phone' => '69992993',
            'iframe' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15299.547783535572!2d-68.1491348!3d-16.5318042!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915edfd144114483%3A0xeacc8231fee08d6e!2sSobotred%20Systems!5e0!3m2!1ses-419!2sbo!4v1679447210130!5m2!1ses-419!2sbo"
                width="600" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',

            'status' => 3,
            'slug' => Str::slug('Elvin Listo'),
            'user_id' => 2,
            'category_id' => 1
        ]);


        $faker = Faker::create();
        Image::create([
            'url' => 'profiles/' . $faker->image('public/storage/profiles', 1920, 1080,  null, false),
            'imageable_id' => 2,
            'imageable_type' => 'App\Models\Profile'
        ]);
        $profiles = Profile::create([
            'city' => 'La Paz',
            'state' => 'Bolivia',
            'about' => 'Soy Santiago Boris Quispe Apaza, estudiante de Derecho y Analista de Sistemas experimentado en el campo de Community Manager y Customer Relationship Management basado en el desarrollo de Sistemas Web y Móviles, con ímpetu ante el trabajo bajo presión en equipo o individual, autocritico en términos de aprendizaje en un nuevo campo laborar y apasionado por los retos. Me gusta apoyar en los Proyectos de Grado y ahora Tesis. ',
            'name' => 'Eduardo Libano',
            'email' => 'elvin.listo@gmail.com',
            'date' => '12/12/2023',
            'rpa' => '6028777SBQA',
            'nit' => '6028514015',
            'phone' => '69800887',
            'iframe' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15299.547783535572!2d-68.1491348!3d-16.5318042!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915edfd144114483%3A0xeacc8231fee08d6e!2sSobotred%20Systems!5e0!3m2!1ses-419!2sbo!4v1679447210130!5m2!1ses-419!2sbo"
                width="600" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',

            'status' => 3,
            'slug' => Str::slug('Eduardo Libano'),
            'user_id' => 7,
            'category_id' => 1
        ]);


        $faker = Faker::create();
        Image::create([
            'url' => 'profiles/' . $faker->image('public/storage/profiles', 1920, 1080, null, false),
            'imageable_id' => 7,
            'imageable_type' => 'App\Models\Profile'
        ]);
        $profiles = Profile::create([
            'city' => 'La Paz',
            'state' => 'Bolivia',
            'about' => 'Soy Santiago Boris Quispe Apaza, estudiante de Derecho y Analista de Sistemas experimentado en el campo de Community Manager y Customer Relationship Management basado en el desarrollo de Sistemas Web y Móviles, con ímpetu ante el trabajo bajo presión en equipo o individual, autocritico en términos de aprendizaje en un nuevo campo laborar y apasionado por los retos. Me gusta apoyar en los Proyectos de Grado y ahora Tesis. ',
            'name' => 'Rodrigo Cavina',
            'email' => 'elvin.listo@gmail.com',
            'date' => '12/12/2023',
            'rpa' => '6028777SBQA',
            'nit' => '6028514015',
            'phone' => '69930103',
            'iframe' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15299.547783535572!2d-68.1491348!3d-16.5318042!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915edfd144114483%3A0xeacc8231fee08d6e!2sSobotred%20Systems!5e0!3m2!1ses-419!2sbo!4v1679447210130!5m2!1ses-419!2sbo"
                width="600" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',

            'status' => 3,
            'slug' => Str::slug('Rodrigo Cavina'),
            'user_id' => 3,
            'category_id' => 1
        ]);


        $faker = Faker::create();
        Image::create([
            'url' => 'profiles/' . $faker->image('public/storage/profiles', 1920, 1080,  null, false),
            'imageable_id' => 3,
            'imageable_type' => 'App\Models\Profile'
        ]);
        $profiles = Profile::create([
            'city' => 'La Paz',
            'state' => 'Bolivia',
            'about' => 'Soy Santiago Boris Quispe Apaza, estudiante de Derecho y Analista de Sistemas experimentado en el campo de Community Manager y Customer Relationship Management basado en el desarrollo de Sistemas Web y Móviles, con ímpetu ante el trabajo bajo presión en equipo o individual, autocritico en términos de aprendizaje en un nuevo campo laborar y apasionado por los retos. Me gusta apoyar en los Proyectos de Grado y ahora Tesis. ',
            'name' => 'Mario Vargas',
            'email' => 'elvin.listo@gmail.com',
            'date' => '12/12/2023',
            'rpa' => '6028777SBQA',
            'nit' => '6028514015',
            'phone' => '(+591) 77778837',
            'iframe' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15299.547783535572!2d-68.1491348!3d-16.5318042!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915edfd144114483%3A0xeacc8231fee08d6e!2sSobotred%20Systems!5e0!3m2!1ses-419!2sbo!4v1679447210130!5m2!1ses-419!2sbo"
                width="600" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',

            'status' => 3,
            'slug' => Str::slug('Mario Vargas'),
            'user_id' => 4,
            'category_id' => 1
        ]);


        $faker = Faker::create();
        Image::create([
            'url' => 'profiles/' . $faker->image('public/storage/profiles', 1920, 1080, null, false),
            'imageable_id' => 4,
            'imageable_type' => 'App\Models\Profile'
        ]);
        $profiles = Profile::create([
            'city' => 'La Paz',
            'state' => 'Bolivia',
            'about' => 'Soy Santiago Boris Quispe Apaza, estudiante de Derecho y Analista de Sistemas experimentado en el campo de Community Manager y Customer Relationship Management basado en el desarrollo de Sistemas Web y Móviles, con ímpetu ante el trabajo bajo presión en equipo o individual, autocritico en términos de aprendizaje en un nuevo campo laborar y apasionado por los retos. Me gusta apoyar en los Proyectos de Grado y ahora Tesis. ',
            'name' => 'Pedro Perez',
            'email' => 'elvin.listo@gmail.com',
            'date' => '12/12/2023',
            'rpa' => '6028777SBQA',
            'nit' => '6028514015',
            'phone' => '(+591) 77778837',
            'iframe' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15299.547783535572!2d-68.1491348!3d-16.5318042!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915edfd144114483%3A0xeacc8231fee08d6e!2sSobotred%20Systems!5e0!3m2!1ses-419!2sbo!4v1679447210130!5m2!1ses-419!2sbo"
                width="600" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',

            'status' => 3,
            'slug' => Str::slug('Pedro Perez'),
            'user_id' => 5,
            'category_id' => 1
        ]);


        $faker = Faker::create();
        Image::create([
            'url' => 'profiles/' . $faker->image('public/storage/profiles', 1920, 1080,  null, false),
            'imageable_id' => 5,
            'imageable_type' => 'App\Models\Profile'
        ]);
        $profiles = Profile::create([
            'city' => 'La Paz',
            'state' => 'Bolivia',
            'about' => 'Soy Santiago Boris Quispe Apaza, estudiante de Derecho y Analista de Sistemas experimentado en el campo de Community Manager y Customer Relationship Management basado en el desarrollo de Sistemas Web y Móviles, con ímpetu ante el trabajo bajo presión en equipo o individual, autocritico en términos de aprendizaje en un nuevo campo laborar y apasionado por los retos. Me gusta apoyar en los Proyectos de Grado y ahora Tesis. ',
            'name' => 'Renato Valdivia',
            'email' => 'elvin.listo@gmail.com',
            'date' => '12/12/2023',
            'rpa' => '6028777SBQA',
            'nit' => '6028514015',
            'phone' => '(+591) 77778837',
            'iframe' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15299.547783535572!2d-68.1491348!3d-16.5318042!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915edfd144114483%3A0xeacc8231fee08d6e!2sSobotred%20Systems!5e0!3m2!1ses-419!2sbo!4v1679447210130!5m2!1ses-419!2sbo"
                width="600" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',

            'status' => 3,
            'slug' => Str::slug('Renato Valdivia'),
            'user_id' => 6,
            'category_id' => 1
        ]);


        $faker = Faker::create();
        Image::create([
            'url' => 'profiles/' . $faker->image('public/storage/profiles', 1920, 1080,  null, false),
            'imageable_id' => 6,
            'imageable_type' => 'App\Models\Profile'
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Santiago Quispe Apaza',
            'email' => 'sobotred.systems@gmail.com',
            'phone' => '59177778837',
            'status' => 4,
            'password' => bcrypt('1985srid'),
            // 'slug' => Str::slug('Santiago Quispe Apaza')
        ]);
        $user->assignRole('SuperAdmin');

        $user2 = User::create([
            'name' => 'Albert Perez Perez',
            'email' => 'santiago.boris.q.a@gmail.com',
            'phone' => '59169930103',
            'status' => 4,
            'password' => bcrypt('1985srid'),
            // 'slug' => Str::slug('Albert Perez Perez')
        ]);
        $user2->assignRole('Instructor');

        $user2 = User::create([
            'name' => 'Isaias Albert Lima Paco',
            'email' => 'elvin.listo@gmail.com',
            'phone' => '59169902228',
            'status' => 4,
            'password' => bcrypt('1985srid'),
            // 'slug' => Str::slug('Albert Perez Perez')
        ]);
        $user2->assignRole('Administrativo');

        User::factory(100)->create();
    }
}

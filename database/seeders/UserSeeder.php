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
            'status' => '4',
            'password' => bcrypt('1985srid'),
            // 'slug' => Str::slug('Santiago Quispe Apaza')
        ]);
        $user->assignRole('Admin');

        $user2 = User::create([
            'name' => 'Albert Perez Perez',
            'email' => 'elvin.listo@gmail.com',
            'phone' => '59169800887',
            'status' => 4,
            'password' => bcrypt('1985srid'),
            // 'slug' => Str::slug('Albert Perez Perez')
        ]);
        $user2->assignRole('Instructor');

        User::factory(99)->create();
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('courses');
        Storage::makeDirectory('courses');
        Storage::deleteDirectory('profiles');
        Storage::makeDirectory('profiles');
        Storage::deleteDirectory('posts');
        Storage::makeDirectory('posts');
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PriceSeeder::class);
        $this->call(PlatformSeeder::class);
        // $this->call(CourseSeeder::class);
        // $this->call(CertificateSeeder::class);
        $this->call(ProfileSeeder::class);
        $this->call(TagSeeder::class);
        // $this->call(PostSeeder::class);
        \App\Models\Post::factory(100)->create();
        $this->call(PublicitySeeder::class);
        // $this->call(TagSeeder::class);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

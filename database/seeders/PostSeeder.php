<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $posts = Post::factory(10)->create();
        // foreach ($posts as $post) {
        //     Image::create([
        //         'url' => 'posts/' . $faker->image('public/storage/posts', 1920, 1080, null, false),
        //         'imageable_id' => $post->id,
        //         'imageable_type' => 'App\Models\Post'
        //     ]);
           
        // }
    }
}

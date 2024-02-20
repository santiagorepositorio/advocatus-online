<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $published = $this->faker->randomElement([true, false]);
        $published_at = $published ? now() : null;
        $name = $this->faker->unique()->sentence();
        
        return [      
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->text(200),
            'body' => $this->faker->text(2000),
            'image_path' => $this->faker->imageUrl(1280, 720),
            'published' => $published,           
            'category_id' => $this-> faker->randomElement(Category::where('status', 'blog')->pluck('id')),
            'user_id' => $this->faker->randomElement([1, 2]),
            'published_at' => $published_at,
        ];
    }
}

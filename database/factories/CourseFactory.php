<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Level;
use App\Models\Course;
use App\Models\Category;
use App\Models\Price;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->sentence();

        return [
            'title' => $title,
            'subtitle' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement([Course::BORRADOR, Course::REVISION, Course::PUBLICADO]),
            'slug' => Str::slug($title),
            'user_id' => $this->faker->randomElement([1, 2, 5,10, 15, 20, 25, 30]),
            'level_id' => Level::all()->random()->id,
            'category_id' => $this-> faker->randomElement(Category::where('status', 'Curso')->pluck('id')),
            'price_id' => Price::all()->random()->id,
        ];
    }
}

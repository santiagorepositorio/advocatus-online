<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Folder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Folder>
 */
class FolderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * name

     */
    public function definition()
    {
        $name = $this->faker->sentence();
        return [
            'name' => $name,            
            'status' => $this->faker->randomElement([Folder::BORRADOR, Folder::PRIVADO, Folder::PUBLICO]),            
            'user_id' => $this->faker->randomElement([1, 2]),            
            'category_id' => $this-> faker->randomElement(Category::where('status', 'Curso')->pluck('id')),
        ];
    }
}

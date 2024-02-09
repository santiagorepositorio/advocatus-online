<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Certificate>
 */
class CertificateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        

        return [
            'link' => 'https://chat.whatsapp.com/HF0p7xDqVc64Fsy3jZpKUN',
            'carga' => '50 Horas',
            'course_id' => Course::all()->random()->id     
        ];
    }
}

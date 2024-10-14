<?php

namespace Database\Factories;

use App\Models\Module;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => 'Lesson: '.$this->faker->sentence,
            'description' => $this->faker->paragraph,
            'type' => $this->faker->randomElement(['video', 'document', 'download', 'quiz']),
            'module_id' => Module::factory(),
        ];
    }
}

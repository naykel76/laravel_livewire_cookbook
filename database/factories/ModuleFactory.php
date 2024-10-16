<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModuleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => 'Module: '.$this->faker->sentence,
            'body' => $this->faker->paragraph,
            'course_id' => Course::factory(),
        ];
    }
}

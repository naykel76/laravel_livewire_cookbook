<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    public $images = ['naykel-400-001.png', 'naykel-400-002.png', 'naykel-400-003.png', 'naykel-400-004.png', 'naykel-400-005.png'];

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(5),
            'code' => 'COU-'.$this->faker->unique()->numberBetween(5000, 9000),
            'description' => $this->faker->paragraph,
            'image_name' => $this->faker->randomElement($this->images),
            'price' => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}

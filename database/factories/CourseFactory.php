<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourseFactory extends Factory
{

    public function definition(): array
    {
        $images = ['naykel-400-001.png', 'naykel-400-002.png', 'naykel-400-003.png', 'naykel-400-004.png', 'naykel-400-005.png'];
        $title = $this->faker->sentence(5);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'code' => 'COU-' . $this->faker->unique()->numberBetween(5000, 9000),
            'description' => $this->faker->paragraph,
            'body' => $this->faker->paragraphs(500, true),
            'published_at' => $this->faker->dateTimeThisDecade(),
            'image_name' => $this->faker->randomElement($images),
            'price' => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}

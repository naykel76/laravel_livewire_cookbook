<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentCourseFactory extends Factory
{
    public function definition(): array
    {
        return [
            'started_at' => now(),
            'user_id' => User::factory(),     // Use the User factory to generate a user_id
            'course_id' => Course::factory(), // Use the Course factory to generate a course_id
        ];
    }
}

<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        Course::factory()->create([
            'id' => 400, // Prevent starting from 1
            'title' => 'Course One',
        ]);
        Course::factory()->create([
            'title' => 'Course Two',
        ]);
        Course::factory()->create([
            'title' => 'Course Three',
        ]);
        Course::factory()->create([
            'title' => 'Course Four',
        ]);

    }
}

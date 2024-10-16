<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Module;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        // Setting the ID's to start from a higher value for easier visual differentiation
        $course = Course::factory()
            ->has(Module::factory(3)
                ->state(new Sequence(
                    ['id' => 300, 'title' => 'Module One'],
                    ['id' => 301, 'title' => 'Module Two'],
                    ['id' => 302, 'title' => 'Module Three']
                ))
                ->has(Lesson::factory(random_int(3, 6))))
            ->create(['id' => 200, 'title' => 'Course One']);

        Course::factory()
            ->has(Module::factory(2)
                ->has(Lesson::factory(3)))
            ->create(['title' => 'Course Two']);

        Course::factory()
            ->has(Module::factory(2)
                ->has(Lesson::factory(3)))
            ->create(['title' => 'Course Three']);

        // Course::factory(100)->has(Module::factory(3)->has(Lesson::factory(2)))->create();

    }
}

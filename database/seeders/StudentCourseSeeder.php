<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\StudentCourse;
use App\Models\StudentLesson;
use Illuminate\Database\Seeder;

class StudentCourseSeeder extends Seeder
{
    public function run(): void
    {
        $courseId = 200;

        $studentCourse = StudentCourse::factory()
            ->create(['id' => 800, 'course_id' => $courseId]);

        $this->addStudentLessons($courseId, $studentCourse->id);
    }

    /**
     * Add lessons to a student course.
     */
    public function addStudentLessons(int $cid, int $scid): void
    {
        $course = Course::whereId($cid)->with('modules.lessons')->firstOrFail();
        foreach ($course->modules as $module) {
            foreach ($module->lessons as $lesson) {
                StudentLesson::create([
                    'student_course_id' => $scid,
                    'lesson_id' => $lesson->id,
                ]);
            }
        }
    }
}

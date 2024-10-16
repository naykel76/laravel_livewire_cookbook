<?php

namespace App\Http\Controllers;

use App\Models\StudentCourse;

class EloquentAdvancedNestingController extends Controller
{
    public function __invoke()
    {
        $studentCourse = StudentCourse::select('id', 'course_id', 'started_at', 'completed_at', 'expired_at')
            ->with([
                'course:id,title,code',
                'studentLessons:id,student_course_id,lesson_id,completed_at',   // Load student lessons
                'studentLessons.lesson:id,title,position,module_id',            // Load the lesson details
                'studentLessons.lesson.module:id,title,position,course_id',     // Load the module via the lesson
            ])->first();

        $studentLessons = $studentCourse->studentLessons;
        $groupedStudentLessons = $studentCourse->studentLessons->groupBy('lesson.module_id');

        return view('pages.eloquent-advanced-nesting', compact('studentCourse', 'studentLessons', 'groupedStudentLessons'));
    }
}

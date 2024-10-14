<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Module;

class EloquentEagerLoadSpecificColumnsController extends Controller
{
    public function __invoke()
    {

        // traditional closures
        // $courses = Course::select('id', 'title', 'slug')
        //     ->with([
        //         'modules' => function ($query) {
        //             $query->select('id', 'course_id', 'title');
        //         },
        //         'modules.lessons' => function ($query) {
        //             $query->select('id', 'module_id', 'title');
        //         }
        //     ])->get();

        // shorthand syntax
        $courses = Course::select('id', 'title', 'slug')
            ->with([
                'modules:id,course_id,title',
                'modules.lessons:id,module_id,title',
            ])->get();

        return view('pages.eloquent-eager-load-specific-columns', [
            'courses' => $courses,
            'pageTitle' => 'Eloquent Eager Load Specific Columns',
        ]);
    }
}

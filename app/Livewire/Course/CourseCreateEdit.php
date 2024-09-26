<?php

namespace App\Livewire\Course;

use App\Livewire\Forms\CourseForm;
use App\Models\Course;
use Livewire\Component;
use Naykel\Gotime\Traits\Renderable;
use Naykel\Gotime\Traits\WithLivewireHelpers;

class CourseCreateEdit extends Component
{
    use Renderable, WithLivewireHelpers;

    public CourseForm $form;
    private string $modelClass = Course::class;
    public string $pageTitle = 'Edit Course';
    public string $view = 'livewire.course.course-create-edit';
    public string $routePrefix = 'courses';
    public string $layout = 'app';

    public function mount(Course $course)
    {
        $model = $course->exists ? $course : Course::make();
        $this->form->init($model);
    }
}

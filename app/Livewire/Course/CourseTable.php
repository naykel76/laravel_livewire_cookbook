<?php

namespace App\Livewire\Course;

use App\Livewire\Forms\CourseForm;
use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;
use Naykel\Gotime\Traits\Renderable;
use Naykel\Gotime\Traits\Searchable;
use Naykel\Gotime\Traits\Sortable;
use Naykel\Gotime\Traits\WithLivewireHelpers;

class CourseTable extends Component
{
    use Renderable, Searchable, Sortable, WithLivewireHelpers, WithPagination;

    public CourseForm $form;
    private string $modelClass = Course::class;
    public string $pageTitle = 'Courses Table';
    public string $view = 'livewire.course.course-table';
    public string $routePrefix = 'courses';
    public array $searchableFields = ['code', 'title'];

    protected function prepareData()
    {
        $query = $this->modelClass::query();
        $query = $this->applySorting($query);
        $query = $this->applySearch($query);

        return ['items' => $query->paginate(20)];
    }
}

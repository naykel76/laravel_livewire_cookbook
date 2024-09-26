<?php

namespace App\Livewire\Forms;

use App\Models\Course;
use Illuminate\Validation\Rule;
use Livewire\Form;
use Naykel\Gotime\Traits\Crudable;
use Naykel\Gotime\Traits\Formable;

class CourseForm extends Form
{
    use Crudable, Formable;

    public string $title;
    public string $code;
    public ?string $price;

    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'code' => ['required', Rule::unique('courses')->ignore($this->editing)],
            'price' => 'sometimes|regex:/^\d+(\.\d{2})?$/',
        ];
    }

    public function init(Course $course): void
    {
        $this->editing = $course;
        $this->setFormProperties($this->editing);

        $this->price = sprintf('%.2f', $this->editing->price); // convert to 2 decimal places
    }
}

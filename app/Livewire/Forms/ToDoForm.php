<?php

namespace App\Livewire\Forms;

use App\Models\ToDo;
use App\Models\User;
use Livewire\Form;
use Naykel\Gotime\Traits\Crudable;
use Naykel\Gotime\Traits\Formable;

class ToDoForm extends Form
{
    use Crudable, Formable;

    public string $name;
    public string $position;
    public ?string $user_id;

    public function rules()
    {
        return [
            'name' => 'required|string|max:128',
            // system fields not handled directly form inputs
            'user_id' => 'sometimes',
            'position' => 'required',
        ];
    }

    public function init(ToDo $todo): void
    {
        $this->editing = $todo;
        $this->setFormProperties($this->editing);

        // update setFormProperties to handle this
        $this->user_id = $editing->user_id ?? null;
    }

    public function createNewModel(array $data = []): ToDo
    {
        return ToDo::factory()->make(array_merge([
            'name' => '',
            // 'user_id' => User::first()->id,
        ], $data));
    }
}

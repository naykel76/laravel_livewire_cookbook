<?php

namespace App\Livewire;

use App\Livewire\Forms\ToDoForm;
use App\Models\ToDo;
use Livewire\Component;
use Naykel\Gotime\Traits\Renderable;
use Naykel\Gotime\Traits\WithLivewireHelpers;

class BasicTableExample extends Component
{
    use Renderable, WithLivewireHelpers;

    public ToDoForm $form;
    protected string $modelClass = ToDo::class;
    public string $view = 'livewire.basic-table-example';

    private function query()
    {
        return $this->modelClass::query();
    }

    protected function prepareData()
    {
        $query = $this->query();

        return ['items' => $query->get()];
    }
}

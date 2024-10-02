<?php

namespace App\Livewire\User;

use App\Livewire\Forms\ToDoForm;
use App\Models\ToDo;
use App\Models\User;
use Livewire\Component;
use Naykel\Gotime\Traits\Renderable;
use Naykel\Gotime\Traits\WithLivewireHelpers;

class ToDoList extends Component
{
    use Renderable, WithLivewireHelpers;

    public ToDoForm $form;
    protected string $modelClass = ToDo::class;
    public string $view = 'livewire.user.to-do-list';

    public function sort($key, $position)
    {
        // Specifies the items to be sorted using the move method's callback
        $this->modelClass::findOrFail($key)
            ->move($position, fn ($query) => $this->filterByUser($query));
    }

    private function filterByUser($query)
    {
        return $query->whereUserId(User::first()->id);
    }

    protected function prepareData()
    {
        $query = $this->modelClass::query();
        $query = $this->filterByUser($query);

        return ['items' => $query->get()];
    }
}

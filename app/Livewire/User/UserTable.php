<?php

namespace App\Livewire\User;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Naykel\Gotime\Traits\Renderable;
use Naykel\Gotime\Traits\Searchable;
use Naykel\Gotime\Traits\Sortable;
use Naykel\Gotime\Traits\WithLivewireHelpers;

class UserTable extends Component
{
    use Renderable, Searchable, Sortable, WithLivewireHelpers, WithPagination;

    public UserForm $form;
    protected string $modelClass = User::class;
    public string $pageTitle = 'Customer Table';
    public string $view = 'livewire.user.user-table';
    public array $searchableFields = ['name', 'email'];
    public string $routePrefix = 'users'; // not required for table, but useful for form

    public function mount(User $user)
    {
        $model = $user->exists ? $user : $this->form->createNewModel();
        // $model = $this->modelClass::first();
        $this->form->init($model);
    }

    protected function prepareData()
    {
        $query = $this->modelClass::query();
        $query = $this->applySorting($query);
        $query = $this->applySearch($query);

        return ['items' => $query->paginate(20)];
    }
}

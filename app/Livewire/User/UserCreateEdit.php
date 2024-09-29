<?php

namespace App\Livewire\User;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use Livewire\Component;
use Naykel\Gotime\Traits\Renderable;
use Naykel\Gotime\Traits\WithLivewireHelpers;

class UserCreateEdit extends Component
{
    use Renderable, WithLivewireHelpers;

    public UserForm $form;
    private string $modelClass = User::class;
    public string $pageTitle = 'Edit User';
    public string $view = 'livewire.user.create-edit';
    public string $routePrefix = 'users'; // only needed for full page via route

    // Note: You only need to initialize the form when accessing the component
    // via a route or when passing a model to the component. Including it here
    // either way does no harm, as it will be overridden when using the 'create'
    // or 'edit' methods from the 'WithLivewireHelpers' trait.
    public function mount(User $user)
    {
        $model = $user->exists ? $user : $this->form->createNewModel();
        $this->form->init($model);
    }
}

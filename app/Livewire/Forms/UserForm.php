<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Validation\Rules;
use Livewire\Form;
use Naykel\Gotime\Traits\Crudable;
use Naykel\Gotime\Traits\Formable;

class UserForm extends Form
{
    use Crudable, Formable;

    public string $name;
    public string $email;
    public string $phone;

    // These properties are not required for the form but are necessary for the
    // model. Their values are automatically set in the UserFactory.
    public string $password;
    public string $email_verified_at;

    public function rules()
    {
        return [
            'name' => 'required|string|max:128',
            'email' => 'required|string|email|max:255|unique:users,email,'.$this->editing->id,
            'phone' => 'nullable|string|regex:/^[0-9+\s]+$/i|min:10',
            'password' => ['required', Rules\Password::defaults()],
            'email_verified_at' => 'nullable|date',
        ];
    }

    public function init(User $user): void
    {
        $this->editing = $user;
        $this->setFormProperties($this->editing);
        // $this->name = Str::title($this->name);
    }

    public function createNewModel(): User
    {
        return User::factory()->unverified()->make([
            'name' => '',
            'email' => '',
        ]);
    }
}

<?php

namespace App\Livewire;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class Register extends Component
{
    public bool $modal = false;

    public string $name = '';

    public string $email = '';
    
    public string $password = '';

    public string $passwordConfirmation = '';

    public string $role = '';

    public function rules() {
        return [
            'name' => 'required|min:3|max:64',
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'confirmed:passwordConfirmation',
                Password::defaults(),
            ],
            'passwordConfirmation' => 'required',
            'role' => 'required'
        ];
    }

    public function register() {
        $data = $this->validate();

        $user = new User();

        $user->password = $data['password'];
        $user->role = $data['role'];
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->save();

        Auth::login($user);

        request()->session()->regenerate();

        return redirect('/');
    }

    public function render()
    {
        return view('livewire.register', [
            'roleCases' => Role::toSelect([Role::ADMIN]),
        ]);
    }
}

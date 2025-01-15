<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{

    public bool $modal = false;

    public string $email = '';

    public string $password = '';

    public function rules() {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }

    public function login() {
        $credentials = $this->validate();

        if(Auth::attempt($credentials)) {
            request()->session()->regenerate();

            return redirect()->intended('/');
        }

        $this->addError('email', 'Niepoprawne dane logowania.');
    }

    public function render()
    {
        return view('livewire.login');
    }
}

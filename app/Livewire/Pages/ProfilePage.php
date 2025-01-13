<?php

namespace App\Livewire\Pages;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;

#[Title('Mój profil')]
class ProfilePage extends Component
{

    use Toast, WithFileUploads;

    public User $user;

    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $passwordConfirmation = '';

    public string|null $avatar;

    public $avatarToUpload;

    public array|null $links;

    public bool $isProfileView = true;

    public string|null $content;

    public $cvToUpload;

    public function mount() {
        $userId = Auth::id();

        $this->user = User::find($userId);
        $this->fill($this->user);
    }

    public function rules() {
        
    }

    public function messages() {

    }

    public function save() {

    }

    public function render()
    {
        return view('livewire.pages.profile-page');
    }
}

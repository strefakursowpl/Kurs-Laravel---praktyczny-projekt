<?php

namespace App\Livewire\Pages;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;
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
        return [
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($this->user->id),
            ],
            'password' => Password::defaults(),
            'avatarToUpload' => [
                'nullable',
                File::image()
                ->max(2048)
                ->dimensions(Rule::dimensions()->minWidth(160)->minHeight(160))
            ],
            'links' => 'array|max:10',
            'links.*' => 'url:https',
            'content' => [
                'nullable',
                'min:10',
                'max:4096',
            ],
            'cvToUpload' => [
                'nullable',
                File::types([
                    'application/pdf',
                    'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                ])
                ->min('10kb')
                ->max('10mb')
            ]
        ];
    }

    public function messages() {
        return [
            'dimensions' => 'Zdjęcie musi mieć minimalne wymiary 160x160 px',
            'between' => [
                'file' => 'Plik musi mieć rozmiar w zakresie :min kb - :max mb',
            ],
        ];
    }

    public function save() {
        $data = $this->validate();

        $this->user->name = $data['name'];
        $this->user->email = $data['email'];
        $this->user->links = $data['links'];
        $this->user->content = $data['content'];

        if($this->password) {
            $this->user->password = $data['password'];
        }

        if($this->avatarToUpload) {
            if($this->user->avatar) {
                Storage::disk('public')->delete($this->user->avatar);
            }
            $avatarUrl = $this->avatarToUpload->store('avatars', 'public');
            $this->user->avatar = $avatarUrl;

            $this->dispatch('avatar-updated', $avatarUrl);
        }

        if($this->cvToUpload) {
            if($this->user->cv_url) {
                Storage::delete($this->user->cv_url);
            }
            $cvUrl = $this->cvToUpload->store('cvs');
            $this->user->cv_url = $cvUrl;
            $this->user->cv_name = $this->cvToUpload->getClientOriginalName();
        }

        $this->user->save();

        $this->isProfileView = true;
        $this->success('Zaktualizowano profil');
    }

    public function render()
    {
        return view('livewire.pages.profile-page');
    }
}

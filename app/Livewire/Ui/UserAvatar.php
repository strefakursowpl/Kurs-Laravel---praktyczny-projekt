<?php

namespace App\Livewire\Ui;

use Livewire\Attributes\On;
use Livewire\Component;

class UserAvatar extends Component
{

    public string|null $avatarUrl;

    #[On('avatar-updated')]
    public function refreshAvatar($avatarUrl) {
        $this->avatarUrl = $avatarUrl;
    }

    public function render()
    {
        return view('livewire.ui.user-avatar');
    }
}

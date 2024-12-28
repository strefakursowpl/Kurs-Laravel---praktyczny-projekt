<?php

namespace App\Livewire\Ui;

use Livewire\Component;

class UserAvatar extends Component
{

    public string|null $avatarUrl;

    public function render()
    {
        return view('livewire.ui.user-avatar');
    }
}

<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.home')]
class HomePage extends Component
{
    public function render()
    {
        return view('livewire.pages.home-page');
    }
}

<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Moje oferty')]
class JobsPage extends Component
{
    public function render()
    {
        return view('livewire.pages.jobs-page', [
            'filters' => [
                'self' => true,
            ]
        ]);
    }
}

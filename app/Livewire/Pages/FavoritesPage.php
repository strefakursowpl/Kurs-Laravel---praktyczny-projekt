<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Ulubione')]
class FavoritesPage extends Component
{
    public function render()
    {
        return view('livewire.pages.favorites-page', [
            'filters' => [
                'favorites' => true
            ]
        ]);
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;

class Search extends Component
{

    public string $search = '';
    
    public function mount() {
        $this->search = 'test';
    }

    public function save() {
        
    }

    public function render()
    {
        return view('livewire.search');
    }
}

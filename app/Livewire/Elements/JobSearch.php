<?php

namespace App\Livewire\Elements;

use Livewire\Component;

class JobSearch extends Component
{

    public string $position = '';

    public ?string $location = null;

    public function submitSearch() {}

    public function render()
    {
        return view('livewire.elements.job-search');
    }
}

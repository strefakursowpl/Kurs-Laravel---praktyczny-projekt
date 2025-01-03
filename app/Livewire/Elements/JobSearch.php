<?php

namespace App\Livewire\Elements;

use Livewire\Component;

class JobSearch extends Component
{

    public string $name = '';

    public ?string $location = null;

    public function submitSearch() {
        $this->dispatch('job-filters-updated', [
            'position' => $this->name,
            'location' => $this->location ?? '',
        ]);
    }

    public function render()
    {
        return view('livewire.elements.job-search');
    }
}

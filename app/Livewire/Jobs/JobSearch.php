<?php

namespace App\Livewire\Jobs;

use Livewire\Component;

class JobSearch extends Component
{

    public string $position = '';

    public ?string $location = null;

    public function submitSearch() {}

    public function render()
    {
        return view('livewire.jobs.job-search');
    }
}

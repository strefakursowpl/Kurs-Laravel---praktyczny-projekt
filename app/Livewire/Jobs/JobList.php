<?php

namespace App\Livewire\Jobs;

use App\Models\Job;
use Livewire\Component;

class JobList extends Component
{

    public function render()
    {
        return view('livewire.jobs.job-list', [
            'jobs' => Job::all(),
        ]);
    }
}

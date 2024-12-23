<?php

namespace App\Livewire\Jobs;

use App\Models\Job;
use Livewire\Component;

class JobItem extends Component
{
    public Job $job;

    public function render()
    {
        return view('livewire.jobs.job-item');
    }
}

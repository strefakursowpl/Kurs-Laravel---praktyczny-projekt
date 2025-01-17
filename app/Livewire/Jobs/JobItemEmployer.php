<?php

namespace App\Livewire\Jobs;

use App\Models\Job;
use Livewire\Component;
use Mary\Traits\Toast;

class JobItemEmployer extends Component
{

    use Toast;

    public Job $job;

    public bool $isDeleted = false;

    public function deleteJob() {
        
    }

    public function render()
    {
        return view('livewire.jobs.job-item-employer');
    }
}

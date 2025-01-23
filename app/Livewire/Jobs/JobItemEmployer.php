<?php

namespace App\Livewire\Jobs;

use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Mary\Traits\Toast;

class JobItemEmployer extends Component
{

    use Toast;

    public Job $job;

    public bool $isDeleted = false;

    public function deleteJob() {
        $this->authorize('manage', $this->job);

        $inquiries = $this->job->jobInquiries;

        foreach($inquiries as $inquiry) {
            if(User::where('cv_url', $inquiry->cv_url)->exists()) {
                continue;
            }
            Storage::delete($inquiry->cv_url);
        }

        Storage::disk('public')->delete($this->job->logo);

        $this->job->delete();
    }

    public function render()
    {
        return view('livewire.jobs.job-item-employer');
    }
}

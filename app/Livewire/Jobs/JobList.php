<?php

namespace App\Livewire\Jobs;

use App\Models\Job;
use Livewire\Component;

class JobList extends Component {

    public int $perPage = 5;

    public function jobs() {
        return Job::query()->latest()->paginate($this->perPage);
    }

    public function loadMore() {
        $this->perPage += 5;
    }

    public function render() {
        return view('livewire.jobs.job-list', [
            'jobs' => $this->jobs()
        ]);
    }
}

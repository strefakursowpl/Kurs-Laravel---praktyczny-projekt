<?php

namespace App\Livewire\Jobs;

use App\Models\Job;
use Livewire\Attributes\On;
use Livewire\Component;

class JobList extends Component {

    /**
     * @var array{
     *  position: string,
     *  location: string,
     * }
     */
    public array $filters = [];

    public int $perPage = 5;

    #[On('job-filters-updated')]
    public function prepareFilters(array $filters) {
        $this->filters = array_merge($this->filters, $filters);
    }

    public function jobs() {
        return Job::query()
            ->latest()
            ->when(
                !empty($this->filters['location']),
                fn($q) => $q->where('location', $this->filters['location'])
            )
            ->when(
                !empty($this->filters['position']),
                fn($q) => $q->where('position', 'like', '%' . $this->filters['position'] . '%')
            )
            ->paginate($this->perPage);
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

<?php

namespace App\Livewire\Jobs;

use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class JobList extends Component {

    /**
     * @var array{
     *  position: string,
     *  location: string,
     *  jobType: array,
     *  experienceLevel: array,
     *  jobMode: array,
     *  jobSchedule: array,
     *  salaryFrom: int,
     *  salaryTo: int,
     *  publish: int,
     *  favorites: bool,
     *  self: bool,
     * }
     */
    public array $filters = [];

    public int $perPage = 5;

    public function mount() {
        foreach($_GET as $name => $value) {
            $this->filters[ $name ] = $value;
        }
        $this->filters['publish'] = $_GET['publish'] ?? 30;
        $this->filters['salaryTo'] = $_GET['salaryTo'] ?? 70000;
    }

    #[On('job-filters-updated')]
    public function prepareFilters(array $filters) {
        $this->perPage = 5;
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
            ->when(
                !empty($this->filters['experienceLevel']),
                fn($q) => $q->whereIn('experience_level', $this->filters['experienceLevel'])
            )
            ->when(
                !empty($this->filters['jobMode']),
                fn($q) => $q->whereIn('mode', $this->filters['jobMode'])
            )
            ->when(
                !empty($this->filters['jobSchedule']),
                fn($q) => $q->whereIn('schedule', $this->filters['jobSchedule'])
            )
            ->when(
                !empty($this->filters['jobType']),
                fn($q) => $q->whereIn('type', $this->filters['jobType'])
            )
            ->when(
                isset($this->filters['salaryFrom']),
                fn($q) => $q->where('salary_from', '>=', $this->filters['salaryFrom'])
            )
            ->when(
                isset($this->filters['salaryTo']),
                fn($q) => $q->where('salary_to', '<=', $this->filters['salaryTo'])
            )
            ->when(
                isset($this->filters['publish']),
                fn($q) => $q->where('created_at', '>', now()->subDays( $this->filters['publish'] ))
            )
            ->when(
                isset($this->filters['favorites']),
                fn($q) => $q->whereRelation('favoriteJobs', 'user_id', Auth::id())
            )
            ->when(isset($this->filters['self']), function($q) {
                return $q->where('employer_id', Auth::id());
            })
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

<?php

namespace App\Livewire\Jobs;

use App\Enums\ExperienceLevel;
use App\Enums\JobMode;
use App\Enums\JobSchedule;
use App\Enums\JobType;
use Livewire\Attributes\Url;
use Livewire\Component;

class JobFilters extends Component
{

    #[Url]
    public array $jobType = [];
    
    #[Url]
    public array $experienceLevel = [];

    #[Url]
    public array $jobMode = [];

    #[Url]
    public array $jobSchedule = [];

    #[Url]
    public int $salaryFrom = 0;

    #[Url]
    public int $salaryTo = 70000;

    #[Url]
    public int $publish = 30;

    private array $publishDays = [
        [
            'id' => 1,
            'name' => '24h',
        ],
        [
            'id' => 3,
            'name' => '3 dni',
        ],
        [
            'id' => 7,
            'name' => '7 dni',
        ],
        [
            'id' => 14,
            'name' => '14 dni',
        ],
        [
            'id' => 30,
            'name' => '30 dni',
        ],
    ];

    public function resetFilters() {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.jobs.job-filters', [
            'jobTypeCases' => JobType::cases(),
            'experienceLevelCases' => ExperienceLevel::cases(),
            'jobScheduleCases' => JobSchedule::cases(),
            'jobModeCases' => JobMode::cases(),
            'publishDays' => $this->publishDays
        ]);
    }
}

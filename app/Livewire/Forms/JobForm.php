<?php

namespace App\Livewire\Forms;

use App\Enums\ExperienceLevel;
use App\Enums\JobMode;
use App\Enums\JobSchedule;
use App\Enums\JobType;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\Rules\File;
use Livewire\Form;

class JobForm extends Form
{
    public string $company_name;

    public string $description;

    public string $position;

    public string $location;

    public string $type;

    public string $experience_level;

    public string $schedule;

    public string $mode;

    public string $salary_from;

    public string $salary_to;

    public string $url;

    public array $tags;

    public $logoToUpload;

    public function rules() {
        return [
            'company_name' => 'required|min:2|max:64',
            'description' => 'required|min:10|max:4096',
            'position' => 'required|min:2|max:255',
            'location' => 'required|exists:cities,name',
            'type' => [
                'required',
                new Enum(JobType::class)
            ],
            'experience_level' => [
                'required',
                new Enum(ExperienceLevel::class)
            ],
            'schedule' => [
                'required',
                new Enum(JobSchedule::class)
            ],
            'mode' => [
                'required',
                new Enum(JobMode::class)
            ],
            'salary_from' => 'numeric|min:30|max:100000',
            'salary_to' => 'numeric|min:30|max:100000|gte:salary_from',
            'url' => 'url:https',
            'tags' => 'array|max:10',
            'tags.*' => 'min:2|max:20',
            'logoToUpload' => [
                'nullable',
                File::image()
                ->max(4096)
                ->dimensions(Rule::dimensions()->minWidth(200)->minHeight(200))
            ],
        ];
    }

    public function messages() {
        return [
            'exists' => 'Podane miasto nie istnieje w bazie danych',
            'gte' => 'Wynagrodzenie "do" musi być większe lub równe wynagrodzeniu "od"',
        ];
    }
}

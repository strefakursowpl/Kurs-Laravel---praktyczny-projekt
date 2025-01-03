<?php

namespace Database\Factories;

use App\Enums\ExperienceLevel;
use App\Enums\JobMode;
use App\Enums\JobSchedule;
use App\Enums\JobType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{

    public array $possiblePositions = [
        'Doradca ds. Nieruchomości',
        'Doradca handlowy',
        'Senior .NET Developer',
        'Księgowy',
        'Architekt',
        'Marketing manager',
        'Artysta ilustrator',
    ];

    public array $possibleLogos = [
        'birdland',
        'cube',
        'donut',
        'pursuit',
        'urban',
        'vector',
        'people',
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $numberPrefix = fake()->numberBetween(1, 30);
        $salaryFrom = $numberPrefix * 1000;

        $numberPrefixTo = fake()->numberBetween(1, 30);
        $salaryTo = $numberPrefixTo * 1000 + $salaryFrom;

        $possibleCities = DB::table('cities')->get()->pluck('name')->all();

        return [
            'employer_id' => User::factory(),
            'description' => fake()->paragraph(3),
            'position' => fake()->randomElement($this->possiblePositions),
            'location' => fake()->randomElement($possibleCities),
            'type' => fake()->randomElement(JobType::cases()),
            'experience_level' => fake()->randomElement(ExperienceLevel::cases()),
            'schedule' => fake()->randomElement(JobSchedule::cases()),
            'mode' => fake()->randomElement(JobMode::cases()),
            'url' => fake()->url(),
            'company_name' => fake()->company(),
            'salary_from' => $salaryFrom,
            'salary_to' => $salaryTo,
            'logo' => '/company_logos/'.fake()->randomElement($this->possibleLogos).'.png',
        ];
    }
}

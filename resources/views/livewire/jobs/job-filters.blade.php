<x-form
    class="mt-3 space-y-5 pb-10"
    x-on:submit.prevent="$dispatch('job-filters-updated', {
        filters: {
            jobType: $wire.jobType,
            experienceLevel: $wire.experienceLevel,
            jobMode: $wire.jobMode,
            jobSchedule: $wire.jobSchedule,
            salaryFrom: $wire.salaryFrom,
            salaryTo: $wire.salaryTo,
            publish: $wire.publish,
        }
    });"
>
    <div class="space-y-3">
        <h3 class="text-lg lg:text-2xl">Rodzaj umowy</h3>
        @foreach ($jobTypeCases as $case)
            <div wire:key="{{$case->value}}">
                <x-checkbox
                    class="checkbox-primary"
                    label="{{$case->label()}}"
                    value="{{$case->value}}"
                    wire:model="jobType"
                />
            </div>
        @endforeach
    </div>
    <div class="space-y-3">
        <h3 class="text-lg lg:text-2xl">Wynagrodzenie</h3>
        <x-money
            label="minimalne"
            locale="pl-PL"
            wire:model="salaryFrom"
        />
        <x-money
            label="maksymalne"
            locale="pl-PL"
            wire:model="salaryTo"
        />
    </div>
    <div class="space-y-3">
        <h3 class="text-lg lg:text-2xl">Doświadczenie</h3>
        @foreach ($experienceLevelCases as $case)
            <div wire:key="{{$case->value}}">
                <x-checkbox
                    class="checkbox-primary"
                    label="{{$case->label()}}"
                    value="{{$case->value}}"
                    wire:model="experienceLevel"
                />
            </div>
        @endforeach
    </div>
    <div class="space-y-3">
        <h3 class="text-lg lg:text-2xl">Wymiar pracy</h3>
        @foreach ($jobScheduleCases as $case)
            <div wire:key="{{$case->value}}">
                <x-checkbox
                    class="checkbox-primary"
                    label="{{$case->label()}}"
                    value="{{$case->value}}"
                    wire:model="jobSchedule"
                />
            </div>
        @endforeach
    </div>
    <div class="space-y-3">
        <h3 class="text-lg lg:text-2xl">Tryb pracy</h3>
        @foreach ($jobModeCases as $case)
            <div wire:key="{{$case->value}}">
                <x-checkbox
                    class="checkbox-primary"
                    label="{{$case->label()}}"
                    value="{{$case->value}}"
                    wire:model="jobMode"
                />
            </div>
        @endforeach
    </div>
    <div class="space-y-3">
        <h3 class="text-lg lg:text-2xl">Czas publikacji ogłoszenia</h3>
        <x-select
            :options="$publishDays"
            wire:model="publish"
        />
    </div>
    <div class="space-y-3 py-2">
        <x-button
            class="btn-secondary w-full"
            icon="s-arrow-path"
            label="Resetuj"
            spinner="resetFilters"
            wire:click="resetFilters"
            x-on:click="$dispatch('job-filters-updated', {
                filters: {
                    jobType: [],
                    experienceLevel: [],
                    jobMode: [],
                    jobSchedule: [],
                    salaryFrom: 0,
                    salaryTo: 70000,
                    publish: 30,
                }
            }); document.querySelector('#job_list').classList.add('opacity-50', 'pointer-events-none'); scroll(0, 600);"
        />
        <x-button
            class="btn-primary w-full"
            icon="o-paper-airplane"
            label="Filtruj"
            type="submit"
            x-on:click="document.querySelector('#job_list').classList.add('opacity-50', 'pointer-events-none'); scroll(0, 600);"
        />
    </div>
</x-form>

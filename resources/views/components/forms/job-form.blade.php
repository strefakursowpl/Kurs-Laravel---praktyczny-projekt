@php
    $jobTypeCases = App\Enums\JobType::toSelect();
    $experienceLevelCases = App\Enums\ExperienceLevel::toSelect();
    $jobScheduleCases = App\Enums\JobSchedule::toSelect();
    $jobModeCases = App\Enums\JobMode::toSelect();
@endphp
@assets
    <link
        href="/assets/easymde.min.css"
        rel="stylesheet"
    />
    <script src="/assets/easymde.min.js"></script>
@endassets
<x-form
    no-separator
    wire:submit="save"
>
    <x-markdown
        :config="config('clickforjob.easeMDEConfig')"
        label="Opis"
        wire:model="form.description"
    />
    <x-input
        label="Stanowisko"
        wire:model="form.position"
    />
    <livewire:ui.city-search
        label="Miejsce pracy"
        wire:model="form.location"
    />
    <x-select
        :options="$jobTypeCases"
        icon="o-user"
        label="Rodzaj zatrudnienia"
        placeholder="Wybierz rodzaj"
        wire:model="form.type"
    />
    <x-select
        :options="$experienceLevelCases"
        icon="o-user"
        label="Poziom doświadczenia"
        placeholder="Wybierz poziom doświadczenia"
        wire:model="form.experience_level"
    />
    <x-select
        :options="$jobScheduleCases"
        icon="o-user"
        label="Wymiar czasu pracy"
        placeholder="Wybierz wymiar czasu pracy"
        wire:model="form.schedule"
    />
    <x-select
        :options="$jobModeCases"
        icon="o-user"
        label="Tryb pracy"
        placeholder="Wybierz tryb"
        wire:model="form.mode"
    />
    <x-input
        label="Adres URL do opisu/aplikacji"
        wire:model="form.url"
    />
    <x-input
        label="Nazwa firmy"
        wire:model="form.company_name"
    />
    <x-money
        label="Wynagrodzenie do"
        locale="pl-PL"
        wire:model="form.salary_from"
    />
    <x-money
        label="Wynagrodzenie od"
        locale="pl-PL"
        wire:model="form.salary_to"
    />
    <small class="mb-2">Stawki mniejsze niż 1000 zł, liczą się jako stawki godzinowe</small>
    <x-file
        accept="image/*"
        wire:model="form.logoToUpload"
    >
    <img
        class="h-40 rounded-lg"
        src="{{isset($job->logo) ? '/storage/' . $job->logo : 'https://placehold.co/250x250' }}"
    />
    </x-file>
    <x-loading
        wire:loading
        wire:target="form.logoToUpload"
    />
    <x-tags
        hint="Wciśnij Enter aby dodać tag, każdy tag może mieć maksymalnie 20 znaków"
        icon="o-home"
        label="Tagi"
        wire:model="form.tags"
    />
    <x-slot:actions>
        <x-button
            label="Anuluj"
            link="/jobs"
        />
        <x-button
            class="btn-primary"
            label="Utwórz"
            spinner="save"
            wire:loading.class="bg-gray pointer-events-none"
            wire:target="form.logoToUpload"
        />
    </x-slot:actions>
</x-form>

<form class="grid lg:grid-cols-[2fr_2fr_1fr] gap-6 lg:gap-12 max-w-[500px] lg:max-w-full mx-auto" wire:submit="submitSearch">
    <x-input wire:model="name" icon="o-magnifying-glass" placeholder="Stanowisko" clearable inline />
    <livewire:ui.city-search wire:model="location" />
    <x-button
        label="Szukaj"
        type="submit"
        class="btn-primary"
        spinner="submitSearch"
    />
</form>

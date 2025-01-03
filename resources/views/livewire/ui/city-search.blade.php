<x-choices
    :label="$label"
    wire:model="city"
    :options="$cities"
    debounce="300ms"
    min-chars="2"
    icon="o-map-pin"
    placeholder="Wyszukaj miasto"
    no-result-text="Nie znaleziono miasta."
    single
    searchable
/>

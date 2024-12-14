<div @class([
    'rounded-md bg-white shadow p-2',
    $class
])>
	<div x-show="$wire.show" x-transition>
		<h2 class="font-bold">
			{{ $title }}
		</h2>
		<p class="italic">{{ $author }}</p>
	</div>
    <x-button type="error" wire:click='delete' wire:loading.class='opacity-50' wire:loading.attr='disabled'>Usuń</x-button>
    <x-button type="danger" x-on:click="$wire.set('show', !$wire.show)">Ukryj</x-button>
</div>

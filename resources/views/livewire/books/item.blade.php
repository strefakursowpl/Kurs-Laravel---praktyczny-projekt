<div @class([
    'rounded-md bg-white shadow p-2',
    $class
])>
	<h2 class="font-bold">
		{{ $title }}
	</h2>
	<p class="italic">{{ $author }}</p>
    <x-button type="error" wire:click='delete'>Usuń</x-button>
</div>

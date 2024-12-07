<div>
    <form wire:submit="save">
        Wyszukiwana wartość: {{$search}}
        <input value="{{$search}}" placeholder="Szukaj..." wire:model="search" />
        <button type="submit" class="block p-3 bg-green-500 text-white">Wyślij</button>
    </form>
</div>

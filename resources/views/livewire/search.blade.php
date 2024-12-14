<div>
    <form wire:submit="save" class="p-3 space-y-3">
        <div>Wyszukiwana wartość: {{$search}}</div>
        <div><span x-text="$wire.search"></span>
            (<span x-text="$wire.search.length"></span>)
        </div>
        <div>
            <input class="border rounded-md p-3" value="{{$search}}" placeholder="Szukaj..." wire:model="search" />
        </div>
        <button type="submit" class="block p-3 bg-green-500 text-white">Wyślij</button>
    </form>
    <button x-on:click="$wire.set('search', '123')" class="block p-3 bg-green-500 text-white">Wyślij za pomocą Alpine</button>
</div>

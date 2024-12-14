<div>
    <div class="grid grid-cols-3 gap-3 bg-gray-500 p-5">
        @foreach ($books as $book)
            <livewire:books.item
                :id="$book->id"
                :author="$book->author"
                :title="$book->title"
                :key="$book->id"
            />
        @endforeach
    </div>
    <div class="mt-3 text-center">
        <x-button>
            <a href="/books/create" wire:navigate>Dodaj nową książkę</a>
        </x-button>
    </div>
</div>

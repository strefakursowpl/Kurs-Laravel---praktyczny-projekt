<div class="grid grid-cols-3 gap-3 bg-gray-500 p-5" x-on:books-changed="$wire.$refresh()">
    @foreach ($books as $book)
        <livewire:books.item
            :id="$book->id"
            :author="$book->author"
            :title="$book->title"
            :key="$book->id"
        />
    @endforeach
</div>

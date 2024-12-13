<?php

namespace App\Livewire\Books;

use App\Models\Book;
use Livewire\Component;

class Item extends Component
{
    public string $title;

    public string $author;

    public int $id;

    public string $class = '';

    public function delete() {
        $book = Book::find($this->id);

        $book->delete();

        $this->dispatch('books-changed');
    }

    public function render()
    {
        return view('livewire.books.item');
    }
}

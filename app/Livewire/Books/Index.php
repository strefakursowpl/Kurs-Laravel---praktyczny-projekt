<?php

namespace App\Livewire\Books;

use Livewire\Component;
use App\Models\Book;
use Livewire\Attributes\On;

class Index extends Component
{
    #[On('books-changed')]
    public function render()
    {
        return view('livewire.books.index', [
            'books' => Book::all(),
        ]);
    }
}

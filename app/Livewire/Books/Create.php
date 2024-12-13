<?php

namespace App\Livewire\Books;

use App\Http\Requests\BookRequest;
use Livewire\Component;
use App\Models\Book;
use Livewire\Attributes\Validate;

class Create extends Component
{
    public string $title;

    public string $author;

    public function rules() {
        return (new BookRequest)->rules();
    }

    public function store() {
        $data = $this->validate();

        Book::create($data);

        return $this->redirect('/books', true);
    }

    public function render()
    {
        return view('livewire.books.create');
    }
}

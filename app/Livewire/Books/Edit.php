<?php

namespace App\Livewire\Books;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Edit extends Component
{
    public string $title;

    public string $author;

    public Book $book;

    public function mount(Book $book) {
        $this->book = $book;

        $this->fill(
            $book->only('author', 'title')
        );
    }

    public function rules() {
        return [
            'title' => [
                'required',
                'max:255',
                Rule::unique('books')->ignore($this->book->id)
            ],
            'author' => 'required|max:255',
        ];
    }

    public function update() {
        $data = $this->validate();
        // sprawdzić czy książka należy do użytkownika który wysłał to zapytanie
        $this->book->author = $data['author'];
        $this->book->title = $data['title'];
        $this->book->save();

        return $this->redirect('/books', true);
    }

    public function render()
    {
        return view('livewire.books.edit');
    }
}

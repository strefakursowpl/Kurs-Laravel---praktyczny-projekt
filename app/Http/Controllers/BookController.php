<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() {
        dd(Book::all());
    }
    
    public function show(Book $book) {
        dd($book->toArray());
    }

    public function create() {
        // Formularz kreacji
        return view('books.create');
    }

    public function store(Request $request) {
        $data = $request->validated();

        Book::create($data);
    }

    public function edit() {
        // Formularz edycji
        return view('books.edit');
    }

    public function update(Request $request, Book $book) {
        $data = $request->validated();
        // sprawdzić czy książka należy do użytkownika który wysłał to zapytanie
        $book->author = $data['author'];
        $book->title = $data['title'];
        $book->save();
    }

    public function destroy(Book $book) {
        // sprawdzić czy książka należy do użytkownika który wysłał to zapytanie
        $book->delete();
    }
}

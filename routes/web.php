<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Livewire\Search;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Livewire\Books\Create;
use App\Livewire\Books\Edit;
use App\Livewire\Books\Index;

Route::get('/', function(Request $request) {

    return view('pages.home', [
        'name' => 'Sebastian',
        'role' => 'user'
    ]);
})->name('login');

Route::get('/search', Search::class);
Route::get('/books/create', Create::class);
Route::get('/books', Index::class);
Route::get('/books/{book}', Edit::class);



<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function(Request $request) {

    dd($request);

    return 'Welcome ROUTING!';
})->name('login');

Route::get('/books', [BookController::class, 'index']);
Route::get('/books/create', [BookController::class, 'create']);
Route::post('/books', [BookController::class, 'store']);
Route::get('/books/{book}', [BookController::class, 'show']);
Route::get('/books/{book}/edit', [BookController::class, 'edit']);
Route::put('/books/{book}', [BookController::class, 'update']);
Route::delete('/books/{book}', [BookController::class, 'destroy']);


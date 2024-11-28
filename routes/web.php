<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function() {
    Route::get('/', function(Request $request) {

        dd($request);

        return 'Welcome ROUTING!';
    })->name('login');
});

Route::middleware('auth')->group(function() {
    Route::get('/users/{user}', function(Request $request, User $user) {

        dd($user->name);
    })->name('singleUser');

    Route::get('/users', function() {

        return view('welcome');
    })->name('users');
});

Route::redirect('/usersss', '/users');

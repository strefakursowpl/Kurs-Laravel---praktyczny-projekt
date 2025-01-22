<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Enums\Role;
use App\Http\Middleware\RoleMiddleware;
use App\Livewire\Pages\FavoritesPage;
use App\Livewire\Pages\HomePage;
use App\Livewire\Pages\InquiriesEmployerPage;
use App\Livewire\Pages\InquiriesUserPage;
use App\Livewire\Pages\JobCreatePage;
use App\Livewire\Pages\JobEditPage;
use App\Livewire\Pages\JobsPage;
use App\Livewire\Pages\ProfilePage;
use App\Mail\NewInquiryMail;
use App\Models\Inquiry;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', HomePage::class)->name('login');

Route::get('/testing', function() {
    if(!app()->environment('local')) {
        return false;
    }

    $inquiry = Inquiry::find(1);
    return new NewInquiryMail($inquiry);
});

Route::get('/logout', function() {
    Auth::logout();

    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/');
});

Route::middleware(
    RoleMiddleware::class
    . ':' . Role::USER->value
    . ',' . Role::EMPLOYER->value
)->group(function() {
    Route::get('/profile', ProfilePage::class);
});

Route::middleware(
    RoleMiddleware::class
    . ':' . Role::USER->value
)->group(function() {
    Route::get('/favorites', FavoritesPage::class);
    Route::get('/inquiries', InquiriesUserPage::class);
});

Route::middleware(
    RoleMiddleware::class
    . ':' . Role::EMPLOYER->value
)->group(function() {
    Route::get('/jobs', JobsPage::class)->name('jobs');
    Route::get('/jobs/create', JobCreatePage::class)->name('jobs.create');
    Route::get('/jobs/{job}/edit', JobEditPage::class);
    Route::get('/jobs/{job}/inquiries', InquiriesEmployerPage::class);
});

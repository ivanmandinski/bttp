<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Login;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Members\MembersList;
use App\Livewire\Admin\Members\MemberForm;
use App\Livewire\Admin\Categories\CategoriesList;
use App\Livewire\Admin\Payments\PaymentsList;
use App\Livewire\Admin\Invoices\InvoicesList;
use App\Livewire\Admin\News\NewsList;
use App\Livewire\Admin\Events\EventsList;

// Public routes
Route::get('/', function () {
    return redirect()->route('login');
})->name('home');

// Auth routes
Route::get('/login', Login::class)->name('login')->middleware('guest');

Route::post('/logout', function () {
    auth()->logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect()->route('login');
})->name('logout')->middleware('auth');

// Admin routes
Route::prefix('admin')->middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->name('admin.')->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');

    // Members
    Route::get('/members', MembersList::class)->name('members.index');
    Route::get('/members/create', MemberForm::class)->name('members.create');
    Route::get('/members/{member}/edit', MemberForm::class)->name('members.edit');

    // Categories
    Route::get('/categories', CategoriesList::class)->name('categories.index');

    // Payments
    Route::get('/payments', PaymentsList::class)->name('payments.index');

    // Invoices
    Route::get('/invoices', InvoicesList::class)->name('invoices.index');

    // News
    Route::get('/news', NewsList::class)->name('news.index');

    // Events
    Route::get('/events', EventsList::class)->name('events.index');
});

<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shows', [ShowController::class, 'index'])->name('shows.index');
Route::get('/shows/{slug}', [ShowController::class, 'show'])->name('shows.show');
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');
Route::get('/faq', [FaqController::class, 'index'])->name('faq');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/users/{name}', [UserProfileController::class, 'show'])->name('users.show');

// Authenticated user routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    // User management
    Route::get('/users', [\App\Http\Controllers\Admin\UsersController::class, 'index'])->name('users.index');
    Route::get('/users/create', [\App\Http\Controllers\Admin\UsersController::class, 'create'])->name('users.create');
    Route::post('/users', [\App\Http\Controllers\Admin\UsersController::class, 'store'])->name('users.store');
    Route::post('/users/{user}/promote', [\App\Http\Controllers\Admin\UsersController::class, 'promote'])->name('users.promote');
    Route::post('/users/{user}/demote', [\App\Http\Controllers\Admin\UsersController::class, 'demote'])->name('users.demote');
    
    // News management
    Route::resource('news', \App\Http\Controllers\Admin\NewsController::class);
    
    // Events management
    Route::resource('events', \App\Http\Controllers\Admin\EventsController::class);
    
    // Tags management
    Route::resource('tags', \App\Http\Controllers\Admin\TagsController::class);
    
    // FAQ management
    Route::resource('faq-categories', \App\Http\Controllers\Admin\FaqCategoriesController::class);
    Route::resource('faq-items', \App\Http\Controllers\Admin\FaqItemsController::class);
});

require __DIR__.'/auth.php';

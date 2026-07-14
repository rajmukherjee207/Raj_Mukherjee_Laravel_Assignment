<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', [ListingController::class, 'index'])->name('home');

// Protected Routes
Route::middleware('auth')->group(function () {

    Route::get('/listing/create', [ListingController::class, 'create'])->name('listing.create');

    Route::post('/listing/store', [ListingController::class, 'store'])->name('listing.store');

    Route::get('/my-listings', [ListingController::class, 'myListings'])->name('listing.my');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('verified')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Public Listing Routes
Route::get('/listing/{id}', [ListingController::class, 'show'])->name('listing.show');
Route::get('/category/{category}', [ListingController::class, 'category'])->name('listing.category');
Route::get('/city/{city}', [ListingController::class, 'city'])->name('listing.city');
Route::get('/search/{city}/{category}', [ListingController::class, 'cityCategory'])->name('listing.cityCategory');

require __DIR__.'/auth.php';
<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyListingController;
use Illuminate\Support\Facades\Route;
use App\Models\PropertyListing;

//create home route allowing both unauthorized and authorized users to access the home page
Route::get('/', function () {
    return view('home');
})->name('home');

//create properties route
Route::get('/properties', [PropertyListingController::class, 'index'])->name('properties.index');

//make a route to properties.index to show a specific property listing
Route::get('/properties/{slug}', [PropertyListingController::class, 'show'])->name('properties.show');

//create enquiries route
Route::get('/enquiries', function () {
    return view('enquiries');
})->name('enquiries');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

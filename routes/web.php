<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
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

//create a route to book a property
Route::get('/properties/{slug}/book', [PropertyListingController::class, 'book'])->name('properties.book');

//create a bookings route
Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');

//create a contact route
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

//create privacy policy route
Route::get('/privacy', function () {
    return view('privacy-policy');
})->name('privacy-policy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

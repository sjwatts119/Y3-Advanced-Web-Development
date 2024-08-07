<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyListingController;
use App\Models\Booking;
use Illuminate\Support\Facades\Route;
use App\Models\PropertyListing;

//create home route allowing both unauthorized and authorized users to access the home page
Route::get('/', function () {
    return view('home')->with([
        'listings' => PropertyListing::all(),
        'bookings' => Booking::all()
    ]);
})->name('home');

//create properties route
Route::get('/properties', [PropertyListingController::class, 'index'])->name('properties.index');

//make a route to properties.index to show a specific property listing
Route::get('/properties/{slug}', [PropertyListingController::class, 'show'])->name('properties.show');

//create a route to book a property
Route::get('/properties/{slug}/book', [PropertyListingController::class, 'book'])->name('properties.book');

//create a route to store a booking
Route::post('/properties/{slug}/book', [PropertyListingController::class, 'storeBooking'])->name('properties.storeBooking');

//create a route to show a successful booking
Route::get('/properties/{slug}/book/success', [PropertyListingController::class, 'success'])->name('properties.success');

//create a contact route
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

//create a route to store a contact
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

//create a route to show if the message was sent successfully
Route::get('/contact/success', [ContactController::class, 'success'])->name('contact.success');

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

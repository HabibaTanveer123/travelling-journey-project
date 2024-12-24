<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\BookingController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ContactController;



Route::get('/admin/contactMessages', [ContactController::class, 'index'])->name('admin.contactMessages');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/memories', [ReviewController::class, 'index'])->name('memories');
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');


Route::get('/packages', [PackageController::class, 'getPackagesByCategory'])->name('packages');


// ==================== User-facing Routes ====================
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');

// Home page
Route::get('/', [WebController::class, 'index'])->name('index');

// Booking page
Route::get('/booking', [WebController::class, 'booking'])->name('booking');

// Packages (frontend view all packages)

// Package details (frontend view details of a single package)
Route::get('/packages/{id}', [WebController::class, 'packageDetails'])->name('packages.details');

// Memories page

// Contact Us page
Route::get('/contactUs', [WebController::class, 'contactUs'])->name('contactUs');

// ==================== Admin Routes ====================

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

    // Admin Dashboard
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('packages/viewBookings', [AdminController::class, 'viewBookings'])->name('packages.viewBookings');

    // ==================== Bookings ====================

    // View all bookings
    Route::get('bookings', [BookingController::class, 'index'])->name('bookings.index');

    // Edit Booking (calls BookingController)
    Route::get('bookings/{id}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
    
    // Update Booking (calls BookingController)
    Route::put('bookings/{id}', [BookingController::class, 'update'])->name('bookings.update');

    // Delete Booking (calls BookingController)
    Route::delete('bookings/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');

    // ==================== Package Management ====================

    // View all packages
    Route::get('packages', [PackageController::class, 'index'])->name('packages.index');

    // Add a new package
    Route::get('packages/create', [PackageController::class, 'create'])->name('packages.create');

    // Save a new package
    Route::post('packages', [PackageController::class, 'store'])->name('packages.store');

    // Edit a package
    Route::get('packages/{package}/edit', [PackageController::class, 'edit'])->name('packages.edit');

    // Update a package
    Route::put('packages/{package}', [PackageController::class, 'update'])->name('packages.update');

    // Delete a package
    Route::delete('packages/{package}', [PackageController::class, 'destroy'])->name('packages.destroy');
});
Route::post('/store', [BookingController::class, 'store'])->name('store');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('categories', CategoryController::class);
});
// ==================== Authentication Routes ====================
require __DIR__ . '/auth.php';

// Override Default Login Redirect
// Override the login route to use your custom AuthenticatedSessionController
// Route::post('/login', [AuthenticatedSessionController::class, 'store'])
//     ->middleware(['guest'])
//     ->name('login');


// ==================== Profile Routes ====================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/dashboard', function () {
    return view('/web/index'); // Replace 'dashboard' with the appropriate view
})->name('dashboard');

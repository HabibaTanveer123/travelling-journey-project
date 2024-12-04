<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\BookingController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

// ==================== User-facing Routes ====================

// Home page
Route::get('/', [WebController::class, 'index'])->name('index');

// Booking page
Route::get('/booking', [WebController::class, 'booking'])->name('booking');

// Packages (frontend view all packages)
Route::get('/packages', [WebController::class, 'packages'])->name('packages');

// Package details (frontend view details of a single package)
Route::get('/packages/{id}', [WebController::class, 'packageDetails'])->name('packages.details');

// Memories page
Route::get('/memories', [WebController::class, 'memories'])->name('memories');

// Contact Us page
Route::get('/contactUs', [WebController::class, 'contactUs'])->name('contactUs');

// ==================== Admin Routes ====================

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

    // Admin Dashboard
    Route::get('index', [AdminController::class, 'index'])->name('index');
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

// ==================== Authentication Routes ====================
require __DIR__ . '/auth.php';

// Override Default Login Redirect
Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware(['guest'])
    ->name('login')
    ->defaults('redirect', '/admin/index'); // Redirect to admin after login

// ==================== Profile Routes ====================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

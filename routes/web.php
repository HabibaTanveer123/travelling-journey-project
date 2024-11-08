<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebController::class, 'index'])->name('index');
Route::get('/booking', [WebController::class, 'booking'])->name('booking');
Route::get('/packages', [WebController::class, 'packages'])->name('packages');
Route::get('/memories', [WebController::class, 'memories'])->name('memories');
Route::get('/contactUs', [WebController::class, 'conatctUs'])->name('contactUs');


Route::post('/submit-booking', [WebController::class, 'submitBooking'])->name('submitBooking');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Frontend\EventPublicController;
use Illuminate\Support\Facades\Session;



Route::get('/admin', [LoginController::class, 'index'])->name('login');
Route::post('/submit', [LoginController::class, 'checkLogin'])->name('submit');


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('/events', EventController::class);

    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::get('/events/{event}/activate', [EventController::class, 'activate'])->name('events.activate');
    Route::get('/events/{event}/deactivate', [EventController::class, 'deactivate'])->name('events.deactivate');
});     

Route::get('/bookings', [BookingController::class, 'index'])->name('booking.index');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', [EventPublicController::class, 'index'])->name('events.public');
Route::get('/event/{id}', [EventPublicController::class, 'show'])->name('events.show');
Route::post('/event/book/{id}', [BookingController::class, 'book'])->name('events.book');

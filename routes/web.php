<?php

use App\Http\Controllers\Admin\RoomsController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\UserRoomController;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'auth.isAdmin'])->name('admin.')->group(function () {
    Route::resource('/rooms', RoomsController::class);
});

Route::prefix('user')->middleware(['auth', 'auth.isAuthorizedGuest'])->name('user.')->group(function () {
    Route::resource('/bookings', BookingsController::class)
    ->except(['create']);
    Route::get('/bookings/room/{room}', [BookingsController::class, 'createBooking'])
        ->name('bookings.createBooking');
    Route::post('/bookings/{booking}', [BookingsController::class, 'checkIn'])
        ->name('bookings.checkIn');
    Route::resource('/rooms', UserRoomController::class)
        ->except(['create', 'store', 'edit', 'update', 'destroy']);
});

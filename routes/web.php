<?php

use App\Http\Controllers\Admin\RoomsController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\CancelledBookingsController;
use App\Http\Controllers\DeletedRoomsController;
use App\Http\Controllers\FinishedBookingsController;
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

    Route::get('/room/deleted', [DeletedRoomsController::class, 'index'])
        ->name('rooms.deleted');
    Route::put('/room/deleted/{room}', [DeletedRoomsController::class, 'restore'])
        ->name('rooms.deleted.restore');
    Route::delete('/room/deleted/{room}', [DeletedRoomsController::class, 'delete'])
        ->name('rooms.deleted.delete');
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

    Route::get('/booking/finished', [FinishedBookingsController::class, 'index'])
        ->name('bookings.finished');
    Route::get('/booking/finished/{booking}', [FinishedBookingsController::class, 'show'])
        ->name('bookings.finished.detail');

    Route::get('booking/cancelled', [CancelledBookingsController::class, 'index'])
        ->name('bookings.cancelled');
    Route::get('booking/cancelled/{booking}', [CancelledBookingsController::class, 'show'])
        ->name('bookings.cancelled.detail');
    Route::put('booking/cancelled/{booking}', [CancelledBookingsController::class, 'restore'])
        ->name('bookings.cancelled.restore');
    Route::delete('booking/cancelled/{booking}', [CancelledBookingsController::class, 'delete'])
        ->name('bookings.cancelled.delete');
});

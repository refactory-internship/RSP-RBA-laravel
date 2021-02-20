<?php

use App\Http\Controllers\Admin\RoomsController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\CancelledBookingsController;
use App\Http\Controllers\DeletedRoomsController;
use App\Http\Controllers\FinishedBookingsController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PhotoRoomsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserRoomController;
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

//profile routes
Route::prefix('profile')->middleware('auth')->name('profile.')->group(function () {
    Route::get('/', [ProfileController::class, 'show'])
        ->name('show');
    Route::get('/edit', [ProfileController::class, 'edit'])
        ->name('edit');
    Route::put('/update', [ProfileController::class, 'update'])
        ->name('update');

    Route::get('/edit/password', [PasswordController::class, 'edit'])
        ->name('edit.password');
    Route::put('/update/password', [PasswordController::class, 'update'])
        ->name('update.password');
});

Route::prefix('admin')->middleware(['auth', 'auth.isAdmin'])->name('admin.')->group(function () {
    //Room Route Resource
    Route::resource('/rooms', RoomsController::class);
    //Deleted Room Routes
    Route::get('/room/deleted', [DeletedRoomsController::class, 'index'])
        ->name('rooms.deleted');
    Route::put('/room/deleted/{room}', [DeletedRoomsController::class, 'restore'])
        ->name('rooms.deleted.restore');
    Route::delete('/room/deleted/{room}', [DeletedRoomsController::class, 'delete'])
        ->name('rooms.deleted.delete');
    //Room's Photos Route Resource
    Route::resource('/rooms/photo', PhotoRoomsController::class)
        ->except(['index', 'create', 'store', 'edit', 'show']);
});

Route::prefix('user')->middleware(['auth', 'auth.isAuthorizedGuest'])->name('user.')->group(function () {
    //Booking Route Resource
    Route::resource('/bookings', BookingsController::class)
        ->except(['create']);
    //Routes for Creating New Booking and Check-In
    Route::get('/bookings/room/{room}', [BookingsController::class, 'createBooking'])
        ->name('bookings.createBooking');
    Route::post('/bookings/{booking}', [BookingsController::class, 'checkIn'])
        ->name('bookings.checkIn');
    //Route for Displaying Rooms to User
    Route::resource('/rooms', UserRoomController::class)
        ->except(['create', 'store', 'edit', 'update', 'destroy']);
    //Finished Booking Routes
    Route::get('/booking/finished', [FinishedBookingsController::class, 'index'])
        ->name('bookings.finished');
    Route::get('/booking/finished/{booking}', [FinishedBookingsController::class, 'show'])
        ->name('bookings.finished.detail');
    //Cancelled Booking Routes
    Route::get('booking/cancelled', [CancelledBookingsController::class, 'index'])
        ->name('bookings.cancelled');
    Route::get('booking/cancelled/{booking}', [CancelledBookingsController::class, 'show'])
        ->name('bookings.cancelled.detail');
    Route::put('booking/cancelled/{booking}', [CancelledBookingsController::class, 'restore'])
        ->name('bookings.cancelled.restore');
    Route::delete('booking/cancelled/{booking}', [CancelledBookingsController::class, 'delete'])
        ->name('bookings.cancelled.delete');
});

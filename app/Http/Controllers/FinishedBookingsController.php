<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinishedBookingsController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $user = Auth::user();
        $booking = Booking::where('user_id', $user->id)
            ->where('isCheckedIn', true)
            ->orderBy('booking_time', 'ASC')->paginate(5);
        return view('user.booking.finished-bookings', compact('booking'));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $booking = Booking::find($id);
        return view('user.booking.finished-booking-show', compact('booking'));
    }
}

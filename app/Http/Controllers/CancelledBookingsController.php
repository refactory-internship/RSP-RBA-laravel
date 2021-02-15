<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CancelledBookingsController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $user = Auth::user();
        $booking = Booking::onlyTrashed()
            ->where('user_id', $user->id)
            ->get();
        return view('user.booking.cancelled-booking', compact('booking'));
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $booking = Booking::onlyTrashed()->find($id);
        return view('user.booking.cancelled-booking-show', compact('booking'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        $booking = Booking::onlyTrashed()->find($id);
        $booking->restore();
        return redirect('/user/bookings')->with('message', 'Your booking has been restored!');
    }

    public function delete($id)
    {
        $booking = Booking::onlyTrashed()->find($id);
        $booking->forceDelete();
        return redirect('/user/bookings')->with('error', 'Your booking has been deleted permanently!');
    }
}

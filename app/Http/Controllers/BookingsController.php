<?php

namespace App\Http\Controllers;

use App\Mail\BookingDetails;
use App\Mail\BookingUpdateMail;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        $booking = Booking::where('user_id', $user->id)->orderBy('booking_time', 'ASC')->paginate(5);
        return view('user.booking.index', compact('booking'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        //
    }

    /**
     * @param Room $room
     * @return Application|Factory|View
     */
    public function createBooking(Room $room)
    {
        return view('user.booking.create', compact('room'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        //
        $room = Room::find($request->room_id);
        $user = Auth::user();
        if ($request->total_person > $room->room_capacity) {
            return redirect()->back()->with('error', "Total person is more than the room's capacity!");
        } else {
            Booking::create([
                'user_id' => $user->id,
                'room_id' => $room->id,
                'total_person' => $request->total_person,
                'note' => $request->note,
                'booking_time' => $request->booking_time,
                'check_in_time' => date_create($request->booking_time)->setTime(9, 00),
                'check_out_time' => date_create($request->booking_time)->setTime(16, 00)
            ]);

            Mail::to($user->email)->send(new BookingDetails());

            return redirect()->back()->with('message', 'Your booking has been stored successfully!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Booking $booking
     * @return Application|Factory|View|Response
     */
    public function show(Booking $booking)
    {
        //
        return view('user.booking.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Booking $booking
     * @return Application|Factory|View|Response
     */
    public function edit(Booking $booking)
    {
        //
        return view('user.booking.edit', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Booking $booking
     * @return RedirectResponse
     */
    public function update(Request $request, Booking $booking)
    {
        //
        $user = Auth::user();
        if ($request->total_person > $booking->room->room_capacity) {
            return redirect()->back()->with('error', "Total person is more than the room's capacity!");
        } else {
            $booking->update([
                'total_person' => $request->total_person,
                'note' => $request->note,
                'booking_time' => $request->booking_time,
                'check_in_time' => date_create($request->booking_time)->setTime(9, 00),
                'check_out_time' => date_create($request->booking_time)->setTime(16, 00)
            ]);
            Mail::to($user->email)->send(new BookingUpdateMail());
            return redirect()->back()->with('message', 'Your booking has been updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Booking $booking
     * @return Application|Factory|View|RedirectResponse
     */
    public function destroy(Booking $booking)
    {
        //
        $booking->delete();
        return redirect('user/bookings')->with('error', 'Your booking has been cancelled!');
    }
}

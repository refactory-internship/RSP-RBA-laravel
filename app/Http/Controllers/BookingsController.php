<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //
        $room = Room::find($request->room_id);

        if ($request->total_person > $room->room_capacity) {
            return redirect()->back()->with('error', "Total person is more than the room's capacity!");
        } else {
            Booking::create([
                'user_id' => Auth::user()->id,
                'room_id' => $room->id,
                'total_person' => $request->total_person,
                'note' => $request->note,
                'booking_time' => $request->booking_time,
                'check_in_time' => date_create($request->booking_time)->setTime(9, 00),
                'check_out_time' => date_create($request->booking_time)->setTime(16, 00)
            ]);

            return redirect()->back()->with('message', 'Your booking has been stored successfully!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Booking $booking
     * @return Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Booking $booking
     * @return Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Booking $booking
     * @return Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Booking $booking
     * @return Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}

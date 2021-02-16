<?php

namespace App\Http\Controllers;

use App\Http\Requests\Bookings\Store;
use App\Mail\BookingDetails;
use App\Mail\BookingUpdateMail;
use App\Mail\CheckInMail;
use App\Models\Booking;
use App\Models\Room;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
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
        $booking = Booking::query()->where('user_id', $user->id)
            ->where('isCheckedIn', false)
            ->orderBy('booking_time', 'ASC')->paginate(5);
        return view('user.booking.index', compact('booking'));
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
     * @param Store $request
     * @return RedirectResponse
     */
    public function store(Store $request)
    {
        $room = Room::query()->find($request->room_id);
        $user = Auth::user();
        if ($request->total_person > $room->room_capacity) {
            return redirect()->back()->with('error', "Total person is more than the room's capacity!");
        } else {
            Booking::query()->create([
                'user_id' => $user->id,
                'room_id' => $room->id,
                'total_person' => $request->total_person,
                'note' => $request->note,
                'booking_time' => $request->booking_time,
                'check_in_time' => date_create($request->booking_time)->setTime(9, 00),
                'check_out_time' => date_create($request->booking_time)->setTime(16, 00)
            ]);
            Mail::to($user->email)->send(new BookingDetails());
            return redirect('user/bookings')->with('message', 'Your booking has been stored successfully!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Application|Factory|View|Response
     */
    public function show($id)
    {
        $booking = Booking::query()->find($id);
        return view('user.booking.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View|Response
     */
    public function edit($id)
    {
        $booking = Booking::query()->find($id);
        return view('user.booking.edit', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Store $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Store $request, $id)
    {
        $user = Auth::user();
        $booking = Booking::query()->find($id);
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
            return redirect('user/bookings')->with('message', 'Your booking has been updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     * @throws Exception
     */
    public function destroy($id)
    {
        //
        $booking = Booking::query()->find($id);
        $booking->delete();
        return redirect('user/bookings')->with('error', 'Your booking has been cancelled!');
    }

    /**
     * @param $id
     * @return Application|RedirectResponse|Redirector
     */
    public function checkIn($id)
    {
        $user = Auth::user();
        $booking = Booking::query()->find($id);
        $booking->update([
            'isCheckedIn' => true
        ]);

        Mail::to($user->email)->send(new CheckInMail());
        return redirect('/user/bookings')->with('message', 'You have been checked in!');
    }
}

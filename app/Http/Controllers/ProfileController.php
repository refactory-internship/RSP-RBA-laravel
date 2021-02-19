<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\Update;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function show()
    {
        $user = Auth::user();
        $finishedBooking = Booking::query()->where('user_id', $user->id)
            ->where('isCheckedIn', true)
            ->get();
        $cancelledBooking = Booking::onlyTrashed()->where('user_id', $user->id)->get();
        return view('user.profile.show', compact('user', 'finishedBooking', 'cancelledBooking'));
    }

    /**
     * @return Application|Factory|View
     */
    public function edit()
    {
        $user = Auth::user();
        return view('user.profile.edit', compact('user'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Request $request)
    {
        $user = User::query()->find(Auth::user()->id);
        $user->update([
            'email' => $request->email,
        ]);

        return redirect('/profile')->with('message', 'Your profile has been updated!');
    }
}

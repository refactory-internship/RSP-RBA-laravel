<?php

namespace App\Http\Middleware;

use App\Models\Booking;
use Closure;
use Illuminate\Http\Request;

class AuthorizeGuest
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $booking = Booking::find($request->route('booking'));
        if ($booking && $booking->user_id != auth()->user()->id) {
            return redirect('/user/bookings');
        }

        return $next($request);
    }
}

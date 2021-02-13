@component('mail::message')
Hello, **{{ $user->email }}**

This is the details of your recently updated booking!

@component('mail::table')
|                         |                                                                   |
|-------------------------|-------------------------------------------------------------------|
|**Your Booked Room Details**                                                                 |
|Room Name :              | {{ $booking->room->room_name }}                                   |
|Room Capacity :          | {{ $booking->room->room_capacity }}                               |
@endcomponent

@component('mail::table')
|                         |                                                                   |
|-------------------------|-------------------------------------------------------------------|
|**Your Booking Details**                                                                     |
|Total Person :           | {{ $booking->total_person }} Person                               |
|Additional Notes :       | {{ $booking->note }}                                              |
|Time of Your Booking :   | {{ date('F jS, Y, g:i A', strtotime($booking->booking_time)) }}   |
|Time of Your Check-In :  | {{ date('F jS, Y, g:i A', strtotime($booking->check_in_time)) }}  |
|Time of Your Check-Out : | {{ date('F jS, Y, g:i A', strtotime($booking->check_out_time)) }} |
@endcomponent

Sincerely, <br>
{{ config('app.name') }}
@endcomponent

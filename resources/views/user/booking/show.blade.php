@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong>{{ $booking->room->room_name }} Room Booking Details</strong>
                    </div>
                    <div class="card-body m-3">
                        <div class="mb-3">
                            <table class="table table-sm" aria-label="dashboard">
                                <tbody>
                                <tr>
                                    <th scope="row">Room Name</th>
                                    <td>{{ $booking->room->room_name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Total Person</th>
                                    <td>{{ $booking->total_person }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Additional Notes</th>
                                    <td>{{ $booking->note }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Booking Time</th>
                                    <td>{{ date('F jS, Y, \a\t G:i', strtotime($booking->booking_time)) }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Check-In Time</th>
                                    <td>{{ date('F jS, Y, \a\t G:i', strtotime($booking->check_in_time)) }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Check-Out Time</th>
                                    <td>{{ date('F jS, Y, \a\t G:i', strtotime($booking->check_out_time)) }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mb-3">
                            <a href="{{ route('user.bookings.index') }}" class="btn btn-outline-secondary">
                                <i class="fa fa-arrow-circle-left"></i>
                                Back
                            </a>
                            <a href="{{ route('user.bookings.edit', $booking->id) }}"
                               class="btn btn-outline-secondary mr-1">
                                <i class="fa fa-pencil"></i>
                                Edit
                            </a>
                            <button type="submit" class="btn btn-outline-success float-right"
                                    onclick="event.preventDefault();
                                    document.getElementById('checkInBooking').submit()">
                                <i class="fa fa-check"></i>
                                Check-In!
                            </button>
                        </div>
                        <form action="{{ route('user.bookings.checkIn', $booking->id) }}"
                              method="post"
                              id="checkInBooking">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

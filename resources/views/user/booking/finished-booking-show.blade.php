@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong>{{ $booking->room->room_name }} Room Check-In Details</strong>
                    </div>
                    <div class="card-body mb-3">
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
                                <td>{{ date('F jS, Y', strtotime($booking->booking_time)) }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Check-In Time</th>
                                <td>{{ date('F jS, Y, \a\t G:i', strtotime($booking->check_in_time)) }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Check-Out Time</th>
                                <td>{{ date('F jS, Y, \a\t G:i', strtotime($booking->check_out_time)) }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Checked In At</th>
                                <td>{{ date('F jS, Y, \a\t G:i', strtotime($booking->updated_at)) }}</td>
                            </tr>
                            </tbody>
                        </table>
                        <a href="{{ route('user.bookings.finished') }}" class="btn btn-outline-secondary">
                            <i class="fa fa-arrow-circle-left"></i>
                            Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

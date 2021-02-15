@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <strong>{{ $booking->room->room_name }} Room Check-In Details</strong>
                    </div>
                    <div class="card-body mb-3">
                        <table class="table table-sm" aria-label="dashboard">
                            <tbody>
                            <tr>
                                <th scope="row"></th>
                                <td><strong>Room Name</strong></td>
                                <td>{{ $booking->room->room_name }}</td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td><strong>Total Person</strong></td>
                                <td>{{ $booking->total_person }}</td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td><strong>Additional Notes</strong></td>
                                <td>{{ $booking->note }}</td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td><strong>Booking Time</strong></td>
                                <td>{{ date('F jS, Y', strtotime($booking->booking_time)) }}</td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td><strong>Check-In Time</strong></td>
                                <td>{{ date('F jS, Y, \a\t G:i', strtotime($booking->check_in_time)) }}</td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td><strong>Check-Out Time</strong></td>
                                <td>{{ date('F jS, Y, \a\t G:i', strtotime($booking->check_out_time)) }}</td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td><strong>Checked In At</strong></td>
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

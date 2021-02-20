@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong>{{ $booking->room->room_name }} Room Cancelled Booking Details</strong>
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
                                <th scope="row">Cancelled At</th>
                                <td>{{ date('F jS, Y, \a\t G:i', strtotime($booking->deleted_at)) }}</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="mb-3">
                            <a href="{{ route('user.bookings.cancelled') }}" class="btn btn-outline-secondary">
                                <i class="fa fa-arrow-circle-left"></i>
                                Back
                            </a>
                            <div class="btn-group float-right">
                                <button type="button" class="btn btn-outline-secondary"
                                        onclick="event.preventDefault();
                                        document.getElementById('restoreBooking').submit()">
                                    <i class="fa fa-undo"></i>
                                    Restore
                                </button>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-secondary"
                                        data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop"
                                        data-bs-url="{{ route('user.bookings.cancelled.delete', $booking->id) }}">
                                    <i class="fa fa-trash"></i>
                                    Delete This Booking
                                </button>
                            </div>
                        </div>
                        <form action="{{ route('user.bookings.cancelled.restore', $booking->id) }}"
                              id="restoreBooking"
                              method="post">
                            @method('PUT')
                            @csrf
                        </form>
                        @include('layouts.modals.delete-booking')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


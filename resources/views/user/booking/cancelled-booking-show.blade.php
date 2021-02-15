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
                                <td><strong>Cancelled At</strong></td>
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
                                <button type="button" class="btn btn-outline-success mr-1"
                                        onclick="event.preventDefault();
                                        document.getElementById('restoreBooking').submit()">
                                    <i class="fa fa-undo"></i>
                                    Restore
                                </button>
                                <button type="button" class="btn btn-outline-danger"
                                        onclick="event.preventDefault();
                                        document.getElementById('permanentDeleteBooking').submit()">
                                    <i class="fa fa-trash"></i>
                                    Delete Permanently
                                </button>
                            </div>
                        </div>
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ session()->get('message') }}
                            </div>
                        @elseif(session()->has('error'))
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        <form action="{{ route('user.bookings.cancelled.restore', $booking->id) }}"
                              id="restoreBooking"
                              method="post">
                            @method('PUT')
                            @csrf
                        </form>
                        <form action="{{ route('user.bookings.cancelled.delete', $booking->id) }}"
                              id="permanentDeleteBooking"
                              method="post">
                            @method('DELETE')
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


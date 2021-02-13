@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <strong>{{ $booking->room->room_name }} Room Booking Details</strong>
                    </div>
                    <div class="card-body m-3">
                        <div class="mb-3">
                            <label for="room_name">Room Name</label>
                            <input type="text" name="room_name" class="form-control" id="room_name"
                                   value="{{ $booking->room->room_name }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="total_person">Total Person</label>
                            <input type="text" name="total_person" class="form-control" id="total_person"
                                   value="{{ $booking->total_person }} Person" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="note">Booking Notes</label>
                            <textarea class="form-control" id="note" name="note" placeholder="{{ $booking->note }}"
                                      disabled
                                      style="resize: none"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="booking_time">Booking Time</label>
                            <input type="text" name="booking_time" class="form-control" id="booking_time"
                                   value="{{ date('F jS, Y, g:i A', strtotime($booking->booking_time)) }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="check_in_time">Check-In Time</label>
                            <input type="text" name="check_in_time" class="form-control" id="check_in_time"
                                   value="{{ date('F jS, Y, g:i A', strtotime($booking->check_in_time)) }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="check_out_time">Check-Out Time</label>
                            <input type="text" name="check_out_time" class="form-control" id="check_out_time"
                                   value="{{ date('F jS, Y, g:i A', strtotime($booking->check_out_time)) }}" disabled>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

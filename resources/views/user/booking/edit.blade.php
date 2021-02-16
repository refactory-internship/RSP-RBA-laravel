@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <strong>Booking Form</strong>
                    </div>
                    <div class="card-body m-3">
                        <form action="{{ route('user.bookings.update', $booking->id) }}" method="post"
                              enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <label for="total_person">Total Person</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control @error('total_person') is-invalid @enderror"
                                       id="total_person" name="total_person"
                                       value="{{ $booking->total_person }}">
                                <span class="input-group-text">Person</span>

                                @error('total_person')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="note">Note</label>
                                <textarea class="form-control" id="note" name="note"
                                          style="resize: none">{{ $booking->note }}</textarea>
                            </div>
                            <label for="booking_time">Booking Time</label>
                            <div class="input-group mb-3">
                                <input type="date" class="form-control @error('booking_time') is-invalid @enderror"
                                       name="booking_time" id="booking_time"
                                       value="{{ $booking->getFormattedBookingTime() }}">

                                @error('booking_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('user.bookings.show', $booking->id) }}"
                                   class="btn btn-outline-secondary">
                                    <i class="fa fa-arrow-circle-left"></i>
                                    Back
                                </a>
                                <input type="submit" value="Submit" class="btn btn-primary">
                                <div class="btn-group float-right">
                                    <button type="button" class="btn btn-outline-danger"
                                            onclick="event.preventDefault();
                                            document.getElementById('deleteBooking').submit()">
                                        <i class="fa fa-trash"></i>
                                        Cancel This Booking
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
                        </form>
                        <form action="{{ route('user.bookings.destroy', $booking->id) }}"
                              id="deleteBooking"
                              method="post">
                            @method('DELETE')
                            @csrf
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <strong>{{ $booking->room->room_name }} Room Details</strong>
                    </div>
                    <div class="card-body m-3">
                        <div class="mb-3">
                            <label for="room_name">Room Name</label>
                            <input type="text" name="room_name" class="form-control" id="room_name"
                                   value="{{ $booking->room->room_name }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="room_capacity">Room Capacity</label>
                            <input type="text" name="room_capacity" class="form-control" id="room_capacity"
                                   value="{{ $booking->room->room_capacity }} Person" disabled>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

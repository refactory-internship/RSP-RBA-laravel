@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <strong>{{ $room->room_name }} Room Details</strong>
                    </div>
                    <div class="card-body m-3">
                        <div class="mb-3">
                            <label for="room_name">Room Name</label>
                            <input type="text" name="room_name" class="form-control" id="room_name" value="{{ $room->room_name }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="room_capacity">Room Capacity</label>
                            <input type="text" name="room_capacity" class="form-control" id="room_capacity" value="{{ $room->room_capacity }} Person" disabled>
                        </div>
                        <div class="mb-3">
                            <a href="{{ route('user.rooms.index') }}" class="btn btn-outline-secondary">
                                <i class="fa fa-arrow-circle-left"></i>
                                Back
                            </a>
                            <a href="{{ route('user.bookings.createBooking', $room->id) }}" class="btn btn-outline-success">
                                <i class="fa fa-check"></i>
                                Book this room!
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

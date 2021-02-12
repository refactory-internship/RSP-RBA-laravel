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
                        <form action="{{ route('user.bookings.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <label for="total_person">Total Person</label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" id="total_person" name="total_person">
                                <span class="input-group-text">Person</span>
                            </div>
                            <div class="mb-3">
                                <label for="note">Note</label>
                                <textarea class="form-control" id="note" name="note"
                                                                    style="resize: none"></textarea>
                            </div>
                            <label for="booking_time">Booking Time</label>
                            <div class="input-group mb-3">
                                <input type="date" class="form-control" name="booking_time" id="booking_time">
                            </div>
                            <input type="hidden" name="room_id" value="{{$room->id}}">
                            <div class="mb-3">
                                <a href="{{ route('user.rooms.show', $room->id) }}" class="btn btn-outline-secondary">
                                    <i class="fa fa-arrow-circle-left"></i>
                                    Back
                                </a>
                                <input type="submit" value="Submit" class="btn btn-primary">
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
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <strong>{{ $room->room_name }} Room Details</strong>
                    </div>
                    <div class="card-body m-3">
                        <div class="mb-3">
                            <label for="room_name">Room Name</label>
                            <input type="text" name="room_name" class="form-control" id="room_name"
                                   value="{{ $room->room_name }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="room_capacity">Room Capacity</label>
                            <input type="text" name="room_capacity" class="form-control" id="room_capacity"
                                   value="{{ $room->room_capacity }} Person" disabled>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

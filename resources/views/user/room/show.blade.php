@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong>{{ $room->room_name }} Room Details</strong>
                    </div>
                    <div class="card-body m-3">
                        @include('layouts.partials.room-details')
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

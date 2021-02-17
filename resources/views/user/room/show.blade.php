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
                        <table class="table table-sm" aria-label="room details table">
                            <tbody>
                            <tr>
                                <td><strong>Room Name</strong></td>
                                <td>{{$room->room_name}}</td>
                            </tr>
                            <tr>
                                <td><strong>Room Capacity</strong></td>
                                <td>{{$room->room_capacity}}</td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="mx-1 mb-3">
                                <strong>Room Photos</strong><br>
                                @foreach($room_photos as $data)
                                    <img class="img-thumbnail mb-1"
                                         src="{{ $data->photo }}"
                                         alt="room photo"
                                         style="max-width: 25%; height: auto;">
                                @endforeach
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

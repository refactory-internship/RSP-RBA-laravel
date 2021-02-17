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
                                <input type="text" class="form-control @error('total_person') is-invalid @enderror"
                                       id="total_person" name="total_person" value="{{ old('total_person') }}">
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
                                          style="resize: none"></textarea>
                            </div>
                            <label for="booking_time">Booking Time</label>
                            <div class="input-group mb-3">
                                <input type="date" class="form-control @error('booking_time') is-invalid @enderror"
                                       name="booking_time" id="booking_time" value="{{ old('booking_time') }}">

                                @error('booking_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
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

            <div class="col-md-7">
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
                            @foreach($room->photos as $data)
                                <img class="img-thumbnail mb-1"
                                     src="{{ $data->photo }}"
                                     alt="room photo"
                                     style="max-width: 25%; height: auto;">
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection

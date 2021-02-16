@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card">
                    <div class="card-header">
                        <strong>Update Room {{ $room->room_name }}</strong>
                    </div>

                    <div class="card-body m-3">

                        <form action="{{ route('admin.rooms.update', $room->id) }}" method="post"
                              enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <div class="input-group mb-3">
                                <span class="input-group-text">Room Name</span>
                                <input type="text" class="form-control @error('room_name') is-invalid @enderror"
                                       aria-label="room_name" name="room_name"
                                       value="{{ $room->room_name }}">

                                @error('room_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <label for="room_capacity">Room Capacity</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control @error('room_capacity') is-invalid @enderror"
                                       placeholder="Room Capacity" id="room_capacity"
                                       name="room_capacity" value="{{ $room->room_capacity }}">
                                <span class="input-group-text">Person</span>

                                @error('room_capacity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <a href="{{ route('admin.rooms.index')}}" class="btn btn-outline-secondary">
                                    <i class="fa fa-arrow-circle-left"></i>
                                    Back
                                </a>

                                <input type="submit" value="Save" class="btn btn-primary">
                            </div>

                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection

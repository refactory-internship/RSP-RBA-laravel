@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.rooms.index') }}">Rooms Data</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="true" href="{{ route('admin.rooms.create') }}">Create
                                    New Room</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body m-3">
                        <form action="{{ route('admin.rooms.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group mb-3">
                                <span class="input-group-text">Room Name</span>
                                <input type="text" class="form-control @error('room_name') is-invalid @enderror"
                                       aria-label="room_name"
                                       name="room_name" value="{{ old('room_name') }}">

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
                                       name="room_capacity" value="{{ old('room_capacity') }}">
                                <span class="input-group-text">Person</span>

                                @error('room_capacity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <label for="photoUploader">Room Photos</label>
                            <div class="input-group mb-3">
                                <input class="form-control" required type="file"
                                       id="photoUploader" name="photo[]" multiple>
                            </div>
                            <div class="thumb-output mb-3"></div>
                            <div class="mb-3">
                                <input type="submit" value="Submit" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

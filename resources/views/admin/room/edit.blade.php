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

                        <form action="{{ route('admin.rooms.update', $room->id) }}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <div class="mb-3">
                                <label for="room_name">Room Name</label>
                                <input type="text" class="form-control" placeholder="Room Name" id="room_name"
                                       name="room_name" value="{{ $room->room_name }}">
                            </div>

                            <div class="mb-3">
                                <label for="room_capacity">Room Capacity</label>
                                <input type="number" class="form-control" placeholder="Room Capacity" id="room_capacity"
                                       name="room_capacity" value="{{ $room->room_capacity }}">
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

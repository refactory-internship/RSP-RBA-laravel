@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
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
                                <strong>Room Photos</strong><br>
                                <div class="row">
                                    @foreach($room->photos as $data)
                                        <div class="col-md-3 mb-1">
                                            <div class="card">
                                                <img class="card-img-top"
                                                     src="{{ $data->secure_url }}"
                                                     alt="room photo">
                                                <div class="card-body">
                                                    <div class="btn-group d-flex">
                                                        <button type="button" class="btn btn-sm btn-outline-secondary"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#editPhotoModal"
                                                                data-bs-url="{{ route('admin.photo.update', $data->id) }}">
                                                            <i class="fa fa-pencil"></i>
                                                            Edit
                                                        </button>
                                                        <a href="#" class="btn btn-sm btn-outline-secondary">
                                                            <i class="fa fa-trash"></i>
                                                            Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <label for="photoUploader">Add More Photos</label>
                            <div class="input-group mb-3">
                                <input class="form-control" type="file"
                                       id="photoUploader" name="photo[]" multiple>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('admin.rooms.index')}}" class="btn btn-outline-secondary">
                                    <i class="fa fa-arrow-circle-left"></i>
                                    Back
                                </a>
                                <input type="submit" value="Save" class="btn btn-primary">
                            </div>
                        </form>

                        {{--Edit Photo Modal--}}
                        <div class="modal fade" id="editPhotoModal" tabindex="-1"
                             aria-labelledby="editPhotoModalLabel" aria-hidden="true"
                             data-bs-backdrop="static"
                             data-bs-keyboard="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editPhotoModalLabel">
                                            Edit {{ $room->room_name }} Room Photos
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                        </button>
                                    </div>
                                    <form id="photoUpdateForm" action="" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <label for="photoUpdate">Update Photo</label>
                                            <div class="input-group mb-3">
                                                <input class="form-control"
                                                       type="file"
                                                       id="photoUpdate" name="photo">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <input type="submit" value="Update" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{--End Edit Photo Modal--}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

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
                                <th scope="row">Room Name</th>
                                <td>{{$room->room_name}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Room Capacity</th>
                                <td>{{$room->room_capacity}}</td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="mb-3">
                            <strong>Room Photos</strong><br>
                            <div class="row">
                                @foreach($room_photos as $data)
                                    <div class="col-md-3 mb-1">
                                        <img class="img-thumbnail mb-1"
                                             src="{{ $data->secure_url }}"
                                             alt="room photo">
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="mb-3">
                            <a href="{{ route('admin.rooms.index')}}" class="btn btn-outline-secondary">
                                <i class="fa fa-arrow-circle-left"></i>
                                Back
                            </a>
                            <div class="btn-group float-right">
                                <a href="{{ route('admin.rooms.edit', $room->id)}}" class="btn btn-outline-secondary">
                                    <i class="fa fa-pencil"></i>
                                    Edit
                                </a>
                                <button type="button" class="btn btn-outline-secondary"
                                        data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop">
                                    <i class="fa fa-trash"></i>
                                    Delete
                                </button>
                            </div>
                            <form id="deleteRoom"
                                  action="{{ route('admin.rooms.destroy', $room->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Modal--}}
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
         data-bs-keyboard="false"
         tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="staticBackdropLabel">Delete
                        Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure want to delete this room?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary"
                            data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-outline-danger"
                            onclick="event.preventDefault();
                                document.getElementById('deleteRoom').submit()">
                        Yes, Delete This Room
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{--End Modal--}}
@endsection

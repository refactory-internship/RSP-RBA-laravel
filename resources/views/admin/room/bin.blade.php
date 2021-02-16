@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card text-center">
                    <div class="card-header">Deleted Rooms</div>
                    <div class="card-body m-3">
                        <table class="table table-hover" aria-describedby="rooms table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Room Name</th>
                                <th scope="col">Room Capacity</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($room as $data)
                                <tr>
                                    <th scope="row">{{$data->id}}</th>
                                    <td>{{ $data->room_name }}</td>
                                    <td>{{ $data->room_capacity }} Person</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-outline-secondary"
                                                    onclick="event.preventDefault();
                                                        document.getElementById('restoreRoom{{ $data->id }}').submit()">
                                                <i class="fa fa-undo"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#staticBackdrop">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <form id="restoreRoom{{ $data->id }}"
                                      action="{{ route('admin.rooms.deleted.restore', $data->id) }}" method="post">
                                    @method('PUT')
                                    @csrf
                                </form>
                                <form id="permanentDeleteRoom{{ $data->id }}"
                                      action="{{ route('admin.rooms.deleted.delete', $data->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                </form>
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
                                                            document.getElementById('permanentDeleteRoom{{ $data->id }}').submit()">
                                                    Yes, Delete This Room Permanently
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--End Modal--}}
                            @endforeach
                            </tbody>
                        </table>
                        @if(session()->has('danger'))
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ session()->get('danger') }}
                            </div>
                        @elseif(session()->has('message'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ session()->get('message') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

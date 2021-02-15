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
                                            <button type="button" class="btn btn-outline-success"
                                                    onclick="event.preventDefault();
                                                        document.getElementById('restoreRoom{{ $data->id }}').submit()">
                                                <i class="fa fa-undo"></i>
                                            </button>

                                            <button type="button" class="btn btn-outline-danger"
                                                    onclick="event.preventDefault();
                                                        document.getElementById('permanentDeleteRoom{{ $data->id }}').submit()">
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
                            @endforeach
                            </tbody>
                        </table>
                        @if(session()->has('danger'))
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ session()->get('danger') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card text-center">
                    <div class="card-header">
                        List of Rooms
                    </div>
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
                                            <a href="{{ route('user.rooms.show', $data->id) }}"
                                               class="btn btn-outline-secondary">
                                                <i class="fa fa-eye"></i>
                                                Check Details
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $room->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

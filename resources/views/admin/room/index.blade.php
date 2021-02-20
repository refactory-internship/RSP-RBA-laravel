@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card text-center">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="true" href="#">Rooms Data</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.rooms.create') }}">Create New Room</a>
                            </li>
                        </ul>
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
                                            <a href="{{ route('admin.rooms.show', $data->id) }}"
                                               class="btn btn-sm btn-outline-secondary">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.rooms.edit', $data->id) }}"
                                               class="btn btn-sm btn-outline-secondary">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $room->links() }}
                        @include('layouts.errors.error-message')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

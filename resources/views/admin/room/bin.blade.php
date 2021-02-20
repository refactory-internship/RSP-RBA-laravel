@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
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
                            @forelse($room as $data)
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
                                                    data-bs-target="#staticBackdrop"
                                                    data-bs-url="{{ route('admin.rooms.deleted.delete', $data->id) }}">
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
                            @empty
                                <tr>
                                    <td colspan="4">No Data</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        @include('layouts.modals.delete-room')
                        @include('layouts.errors.error-message')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

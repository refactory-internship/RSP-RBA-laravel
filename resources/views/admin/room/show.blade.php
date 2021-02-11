@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <strong>{{ $room->room_name }} Room Details</strong>
                    </div>
                    <div class="card-body m-3">
                        Room Name: {{$room->room_name}}<br>
                        Room Capacity: {{$room->room_capacity}}<br><br>
                        <div class="mb-3">
                            <a href="{{ route('admin.rooms.index')}}" class="btn btn-outline-secondary">
                                <i class="fa fa-arrow-circle-left"></i>
                                Back
                            </a>
                            <div class="btn-group float-right">
                                <a href="{{ route('admin.rooms.edit', $room->id)}}" class="btn btn-outline-primary mr-1">
                                    <i class="fa fa-pencil"></i>
                                    Edit
                                </a>
                                <button type="button" class="btn btn-outline-danger"
                                        onclick="event.preventDefault();
                                            document.getElementById('deleteRoom{{ $room->id }}').submit()">
                                    <i class="fa fa-trash"></i>
                                    Delete
                                </button>
                            </div>
                            <form id="deleteRoom{{ $room->id }}"
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
@endsection

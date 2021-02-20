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
                        @include('layouts.partials.room-details')
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
                                        data-bs-target="#staticBackdrop"
                                        data-bs-url="{{ route('admin.rooms.destroy', $room->id) }}">
                                    <i class="fa fa-trash"></i>
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.modals.delete-room')
@endsection

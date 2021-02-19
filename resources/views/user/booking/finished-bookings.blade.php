@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Your Finished Bookings
                    </div>
                    <div class="card-body m-3 text-center">
                        <table class="table table-hover" aria-describedby="bookings table">
                            <thead>
                            <tr>
                                <th scope="col">Room Name</th>
                                <th scope="col">Total Person</th>
                                <th scope="col">Booking Time</th>
                                <th scope="col">Check-In Time</th>
                                <th scope="col">Check-Out Time</th>
                                <th scope="col">Finished</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($booking as $data)
                                <tr>
                                    <td>{{ $data->room->room_name }}</td>
                                    <td>{{ $data->total_person }}</td>
                                    <td>{{ date('j/m/Y', strtotime($data->booking_time)) }}</td>
                                    <td>{{ date('j/m/Y, G:i', strtotime($data->check_in_time)) }}</td>
                                    <td>{{ date('j/m/Y, G:i', strtotime($data->check_out_time)) }}</td>
                                    <td><i class="fa fa-check text-success"></i></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('user.bookings.finished.detail', $data->id) }}"
                                               class="btn btn-outline-secondary">
                                                <i class="fa fa-eye"></i>
                                                Check Details
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">No Data</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{ $booking->links() }}
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ session()->get('message') }}
                            </div>
                        @elseif(session()->has('error'))
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ session()->get('error') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

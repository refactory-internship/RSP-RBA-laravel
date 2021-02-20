@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <img src="{{ $user->photo }}" class="card-img-top" alt="profile picture">
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body m-3">
                        <h5>Your Profile</h5>
                        <table class="table table-sm" aria-label="profile">
                            <caption>
                                <a href="{{ route('profile.edit') }}" class="btn btn-outline-secondary float-right">
                                    <i class="fa fa-pencil"></i>
                                    Edit Profile
                                </a>
                            </caption>
                            <tbody>
                            <tr>
                                <th scope="row">Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Role</th>
                                <td>{{ $user->role->name }}</td>
                            </tr>
                            </tbody>
                        </table>

                        @can('isGuest')
                            <h5>Your Bookings</h5>
                            <table class="table table-sm" aria-label="bookings">
                                <caption>
                                    <a href="{{ route('user.bookings.index') }}"
                                       class="btn btn-outline-secondary float-right">
                                        <i class="fa fa-book"></i>
                                        Check All Your Bookings!
                                    </a>
                                </caption>
                                <tbody>
                                <tr>
                                    <th scope="row">Total Bookings Made</th>
                                    <td>{{ count($user->bookings)  }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Finished Bookings</th>
                                    <td>{{ count($finishedBooking)  }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Cancelled Bookings</th>
                                    <td>{{ count($cancelledBooking)  }}</td>
                                </tr>
                                </tbody>
                            </table>
                        @endcan
                        @include('layouts.errors.error-message')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

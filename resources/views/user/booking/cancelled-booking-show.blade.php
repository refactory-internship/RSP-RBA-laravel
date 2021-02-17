@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong>{{ $booking->room->room_name }} Room Cancelled Booking Details</strong>
                    </div>
                    <div class="card-body mb-3">
                        <table class="table table-sm" aria-label="dashboard">
                            <tbody>
                            <tr>
                                <th scope="row"></th>
                                <td><strong>Room Name</strong></td>
                                <td>{{ $booking->room->room_name }}</td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td><strong>Total Person</strong></td>
                                <td>{{ $booking->total_person }}</td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td><strong>Additional Notes</strong></td>
                                <td>{{ $booking->note }}</td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td><strong>Booking Time</strong></td>
                                <td>{{ date('F jS, Y', strtotime($booking->booking_time)) }}</td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td><strong>Check-In Time</strong></td>
                                <td>{{ date('F jS, Y, \a\t G:i', strtotime($booking->check_in_time)) }}</td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td><strong>Check-Out Time</strong></td>
                                <td>{{ date('F jS, Y, \a\t G:i', strtotime($booking->check_out_time)) }}</td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td><strong>Cancelled At</strong></td>
                                <td>{{ date('F jS, Y, \a\t G:i', strtotime($booking->deleted_at)) }}</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="mb-3">
                            <a href="{{ route('user.bookings.cancelled') }}" class="btn btn-outline-secondary">
                                <i class="fa fa-arrow-circle-left"></i>
                                Back
                            </a>
                            <div class="btn-group float-right">
                                <button type="button" class="btn btn-outline-secondary"
                                        onclick="event.preventDefault();
                                        document.getElementById('restoreBooking').submit()">
                                    <i class="fa fa-undo"></i>
                                    Restore
                                </button>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop">
                                    <i class="fa fa-trash"></i>
                                    Delete This Booking
                                </button>

                            </div>
                        </div>
                        <form action="{{ route('user.bookings.cancelled.restore', $booking->id) }}"
                              id="restoreBooking"
                              method="post">
                            @method('PUT')
                            @csrf
                        </form>
                        <form action="{{ route('user.bookings.cancelled.delete', $booking->id) }}"
                              id="permanentDeleteBooking"
                              method="post">
                            @method('DELETE')
                            @csrf
                        </form>
                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
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
                                        Are you sure want to delete this booking permanently?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="button" class="btn btn-outline-danger"
                                                onclick="event.preventDefault();
                                        document.getElementById('permanentDeleteBooking').submit()">
                                            Yes, Delete Permanently
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


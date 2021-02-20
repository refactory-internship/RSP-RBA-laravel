@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <img src="{{ $user->photo }}" class="card-img-top" alt="profile picture">
                    <div class="card-body">
                        <div class="btn-group d-flex">
                            <button type="button" class="btn btn-sm btn-outline-secondary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editPhotoModal"
                                    data-bs-url="{{ route('profile.update.photo') }}">
                                <i class="fa fa-pencil"></i>
                                Edit
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop"
                                    data-bs-url="{{ route('profile.delete.photo') }}">
                                <i class="fa fa-trash"></i>
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="true" href="{{ route('profile.edit') }}">
                                    Edit Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile.edit.password') }}">Edit Password</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body m-3">
                        <form action="{{ route('profile.update') }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" id="email" value="{{ $user->email }}" placeholder="Email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('profile.show') }}" class="btn btn-outline-secondary">
                                    <i class="fa fa-arrow-circle-left"></i>
                                    Back
                                </a>
                                <input type="submit" value="Update" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
                @include('layouts.modals.edit-profile-photo')
                @include('layouts.modals.delete-photo')
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                            <br><br>
                            <table class="table table-sm" aria-label="dashboard">
                                <tbody>
                                <tr>
                                    <th scope="row"></th>
                                    <td>Email</td>
                                    <td>{{ \Illuminate\Support\Facades\Auth::user()->email }}</td>
                                </tr>
                                <tr>
                                    <th scope="row"></th>
                                    <td>Role</td>
                                    <td>{{ \Illuminate\Support\Facades\Auth::user()->role->name }}</td>
                                </tr>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

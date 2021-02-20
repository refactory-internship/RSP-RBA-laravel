<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" aria-label="navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/home') }}">{{ config('app.name') }}</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                @can('isAdmin')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-circle-o"></i>
                            Rooms
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.rooms.index') }}">
                                    <i class="fa fa-book"></i>
                                    All Rooms
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.rooms.deleted') }}">
                                    <i class="fa fa-trash"></i>
                                    Bin
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('isGuest')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.rooms.index') }}">
                            <i class="fa fa-circle-o"></i>
                            Rooms
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-circle-o"></i>
                            Bookings
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('user.bookings.index') }}">
                                    <i class="fa fa-book"></i>
                                    Ongoing Bookings
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('user.bookings.finished') }}">
                                    <i class="fa fa-check"></i>
                                    Finished Bookings
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('user.bookings.cancelled') }}">
                                    <i class="fa fa-trash"></i>
                                    Cancelled Bookings
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest

                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img class="rounded-circle my-auto"
                                 src="{{ \Illuminate\Support\Facades\Auth::user()->photo }}"
                                 alt="profile picture"
                                 style="width: 32px; height: 32px; margin-right: 10px;">
                            {{ Auth::user()->email }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

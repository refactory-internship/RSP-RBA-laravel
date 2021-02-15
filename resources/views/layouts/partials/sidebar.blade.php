<nav class="navbar navbar-expand-md navbar-light shadow-sm" aria-label="navbar">
    <ul class="navbar-nav flex-column">
        @can('isGuest')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.rooms.index') }}">
                    <i class="fa fa-circle-o"></i>
                    Rooms
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                   aria-expanded="false">
                    <i class="fa fa-circle-o"></i>
                    Bookings
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="{{ route('user.bookings.index') }}">
                            <i class="fa fa-book"></i>
                            All Bookings
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-check"></i>
                            Finished Bookings
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-trash"></i>
                            Bin
                        </a>
                    </li>
                </ul>
            </li>
        @endcan

        @can('isAdmin')
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                   aria-expanded="false">
                    <i class="fa fa-circle-o"></i>
                    Rooms
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.rooms.index') }}">
                            <i class="fa fa-book"></i>
                            All Rooms
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="fa fa-trash"></i>
                            Bin
                        </a>
                    </li>
                </ul>
            </li>
        @endcan

    </ul>
</nav>

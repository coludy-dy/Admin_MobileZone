    <nav class="navbar navbar-expand-lg navbar-light navbar-custom px-3">
    <div class="container-fluid">
        <button class="btn btn-outline-secondary d-md-none" id="toggleSidebar">☰</button>

        <ul class="navbar-nav ms-auto align-items-center">

            {{-- Notification Icon --}}
            <li class="nav-item me-3">
                <a class="nav-link position-relative" href="#">
                    <i class="bi bi-bell" style="font-size: 1.2rem;"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        3
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </a>
            </li>

            {{-- Admin Dropdown --}}
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                    Dominic Keller
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{route('admin')}}">Profile</a></li>
                    {{-- <li><a class="dropdown-item" href="#">Settings</a></li> --}}
                    <li><hr class="dropdown-divider"></li>

                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
@include('layouts.message')
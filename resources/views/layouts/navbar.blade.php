<!-- Include Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


<nav class="navbar navbar-expand-lg bg-success px-4">
    <div class="container-fluid">
        <ul class="navbar-nav ms-auto align-items-center">

            <!-- Notification Button -->
            <li class="nav-item me-3">
                <button class="notification-btn">
                    <i class="fa-regular fa-bell"></i>
                    <span class="badge rounded-circle bg-danger notification-badge">13</span>
                </button>
            </li>

            <!-- Admin Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                    Dominic Keller
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</nav>

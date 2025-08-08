<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mobile Zone| Admin</title>
    @vite(['resources/css/app.css','resources/css/admin.css','resources/css/style.css','resources/js/app.js'])
   <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 250px;
            background-color: #2e4e42;
            color: white;
            z-index: 1030; /* higher than navbar default */
        }
        .sidebar .nav-link {
            color: #cfd8dc;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: #455a64;
            color: white;
        }
        .navbar-custom {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            z-index: 1020;
            position: fixed;
            top: 0;
            left: 0;        /* <-- FIX: start at left edge of screen */
            right: 0;
            height: 60px;
            width: 100%;    /* <-- ensure full width */
        }


        .main-content {
            margin-left: 250px;
            padding-top: 70px;
        }
        .navbar-nav .nav-item .nav-link {
            color: #333;
            position: relative;
        }

        .navbar-nav .nav-item .nav-link:hover {
            color: #000;
        }

        .navbar-nav .nav-item .badge {
            font-size: 0.6rem;
            padding: 4px 6px;
            border-radius: 50%;
            position: absolute;
            top: 0;
            right: -4px;
            transform: translate(50%, -50%);
        }
        

        /* Mobile View */
        @media (max-width: 768px) {
            .sidebar {
                left: -250px;
                transition: all 0.3s;
            }
            .sidebar.active {
                left: 0;
            }
            .navbar-custom {
                left: 0;
            }
            .main-content {
                margin-left: 0;
            }
            .navbar-nav .nav-item .nav-link i {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    @include('layouts.sidebar')
    @include('layouts.navbar')
    @include('layouts.message')

    <div class="main-content p-4">
        @yield('content')
    </div>
    @stack('scripts') 
</body>
</html>
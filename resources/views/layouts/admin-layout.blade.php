<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Add your CSS -->
</head>
<body>
    <header>
        <!-- Admin Navigation Bar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Admin Dashboard</a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="{{ route('admin.packages.viewBookings') }}" class="nav-link">View Bookings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.packages.index') }}">View Packages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        {{ $slot }} <!-- Blade Slot for View Content -->
    </main>
    <footer class="text-center py-3">
        &copy; {{ date('Y') }} Admin Dashboard. All Rights Reserved.
    </footer>
</body>
</html>

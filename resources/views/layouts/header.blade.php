<header>
    <!-- Navigation bar with a border -->
    <nav class="navbar bg-body-tertiary" style="border: 1px solid black;">
        <div class="container">
            <!-- Brand/logo link -->
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logo.jpg') }}" width="100" height="40"> <!-- Logo image -->
            </a>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <!-- Button for toggling the navbar on smaller screens -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span> <!-- Icon for the toggler -->
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <!-- Left side: Navigation items -->
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('index') }}">Home</a> <!-- Home link -->
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('booking') }}">Booking</a> <!-- Booking link -->
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('packages') }}">Packages</a> <!-- Packages link -->
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('memories') }}">Memories</a> <!-- Memories link -->
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contactUs') }}">Contact us</a> <!-- Contact Us link -->
                            </li>
                        </ul>
                        <!-- Right side: Admin or Guest -->
                        <div class="d-flex">
                            @auth
                                @if (Auth::user()->email === 'admin@gmail.com')
                                    <span class="navbar-text me-3">Welcome, Admin</span>
                                    <a class="btn btn-outline-primary me-2" href="{{ route('admin.packages.viewBookings') }}">View Bookings</a> <!-- View Bookings -->
                                    <a class="btn btn-outline-secondary" href="{{ route('admin.index') }}">View Package</a> <!-- Add Package -->
                                @else
                                    <script>
                                    <span class="navbar-text me-3">Hello</span>
                                    </script>
                                @endif
                                <a class="btn btn-outline-danger ms-2" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @else
                                <a class="btn btn-outline-primary me-2" href="{{ route('login') }}">Login</a> <!-- Login button -->
                                <a class="btn btn-outline-secondary me-2" href="{{ route('register') }}">Signup</a> <!-- Signup button -->
                            @endauth
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </nav>
</header>
<script src="{{ asset('js/script.js') }}"></script>

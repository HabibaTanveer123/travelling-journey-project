<header>
    <nav class="navbar bg-body-tertiary" style="border: 1px solid black;">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logo.jpg') }}" width="100" height="40">
            </a>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item"><a class="nav-link" href="{{ route('index') }}">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('booking') }}">Booking</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('packages') }}">Packages</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('memories') }}">Memories</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('contactUs') }}">Contact Us</a></li>
                        </ul>

                        <div class="d-flex">
                            <input type="text" id="searchBar" class="form-control me-3" placeholder="Search by Package Name..." style="width: 250px;">
                            <input type="hidden" id="selectedCategory" value=""> <!-- Hidden input for category -->
                            <ul id="searchResults" class="list-group" style="position: absolute; z-index: 1000; width: 250px; display: none;"></ul>

                            @auth
                                @if (Auth::user()->email === 'admin@gmail.com')
                                    <span class="navbar-text me-3">Welcome, Admin</span>
                                    <a class="btn btn-outline-primary me-2" href="{{ route('admin.packages.viewBookings') }}">View Bookings</a>
                                    <a class="btn btn-outline-secondary me-2" href="{{ route('admin.index') }}">View Packages</a>
                                    <a class="btn btn-outline-success me-2" href="{{ route('admin.categories.index') }}">Categories</a>
                                    <a class="btn btn-outline-info me-2" href="{{ route('admin.contactMessages') }}">Messages</a>
                                @else
                                    <span class="navbar-text me-3">Hello, {{ Auth::user()->name }}</span>
                                @endif
                                <a class="btn btn-outline-danger ms-2" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @else
                                <a class="btn btn-outline-primary me-2" href="{{ route('login') }}">Login</a>
                                <a class="btn btn-outline-secondary me-2" href="{{ route('register') }}">Signup</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </nav>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
    <script>
    $('#searchBar').on('input', function () {
        let query = $(this).val().trim(); // Get the search query

        if (query.length > 0) {
            $.ajax({
                url: '/search', // Server endpoint for search
                method: 'GET',
                data: { query: query },
                success: function (data) {
                    let results = '';

                    // Display only package names
                    if (data.packages && data.packages.length) {
                        data.packages.forEach(function (package) {
                            results += `<li class="list-group-item"><a href="/packages/${package.id}">${package.name}</a></li>`;
                        });
                    } else {
                        results = '<li class="list-group-item">No packages found</li>';
                    }

                    $('#searchResults').html(results).show();
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching packages:', error);
                }
            });
        } else {
            $('#searchResults').hide(); // Hide results if search query is empty
        }
    });
</script>

</header>

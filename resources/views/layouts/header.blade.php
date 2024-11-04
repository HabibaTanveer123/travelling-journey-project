<header>
    <!-- Navigation bar with a border -->
    <nav class="navbar bg-body-tertiary" style="border: 1px solid black;">
        <div class="container">
            <!-- Brand/logo link -->
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logo.jpg')}}" width="100" height="40"> <!-- Logo image -->
            </a>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <!-- Button for toggling the navbar on smaller screens -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span> <!-- Icon for the toggler -->
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <!-- Navigation items -->
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/">Home</a> <!-- Home link -->
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/booking">Booking</a> <!-- Booking link -->
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/packages">Packages</a> <!-- Packages link -->
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/memories">Memories</a> <!-- Memories link -->
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/contactUs">Contact us</a> <!-- Contact Us link -->
                            </li>
                        </ul>
                        <!-- Search form -->
                        <form class="d-flex ms-auto" onsubmit="return handleSearch(event);"> 
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="searchQuery" required> <!-- Search input field -->
                            <button class="btn btn-outline-success" type="submit">Search</button> <!-- Search button -->
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </nav>
</header>
<script src="{{ asset('js/script.js') }}"></script>


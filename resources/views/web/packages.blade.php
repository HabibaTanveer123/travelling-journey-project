<x-web-layout>
<body class="body">

<div class="bg-image"> <!-- Background image container -->
    <div class="container my-5"> <!-- Main container with vertical margins -->
        <h2 class="text-center mb-4">Tour Packages</h2> <!-- Section title for tour packages -->
        <div class="row"> <!-- Row to hold tour package columns -->

            <!-- USA Tour Package -->
            <div class="col-md-4 mb-4"> <!-- Column for the USA tour package -->
                <div class="card h-100"> <!-- Card to display package information -->
                    <img src="images/usa.jpg" class="card-img-top" alt="USA Tour" style="height: 200px; object-fit: fill;"> <!-- Image for USA tour -->
                    <div class="card-body"> <!-- Body of the card -->
                        <h5 class="card-title">USA Tour</h5> <!-- Title of the tour package -->
                        <p class="card-text">Explore the United States with guided tours and iconic landmarks.</p> <!-- Description of the tour -->
                        <a href="{{ route('booking', ['destination' => 'USA']) }}" class="btn btn-primary">Book Now</a> <!-- Booking button -->
                    </div>
                </div>
            </div>

            <!-- UAE Tour Package -->
            <div class="col-md-4 mb-4"> <!-- Column for the UAE tour package -->
                <div class="card h-100"> <!-- Card to display package information -->
                    <img src="images/uae.jpg" class="card-img-top" alt="UAE Tour" style="height: 200px; object-fit: fill;"> <!-- Image for UAE tour -->
                    <div class="card-body"> <!-- Body of the card -->
                        <h5 class="card-title">UAE Tour</h5> <!-- Title of the tour package -->
                        <p class="card-text">Experience the modern wonders and rich culture of the UAE.</p> <!-- Description of the tour -->
                        <a href="{{ route('booking', ['destination' => 'UAE']) }}" class="btn btn-primary">Book Now</a> <!-- Booking button -->
                    </div>
                </div>
            </div>

            <!-- Malaysia Tour Package -->
            <div class="col-md-4 mb-4"> <!-- Column for the Malaysia tour package -->
                <div class="card h-100"> <!-- Card to display package information -->
                    <img src="images/malaysia.jpg" class="card-img-top" alt="Malaysia Tour" style="height: 200px; object-fit: fill;"> <!-- Image for Malaysia tour -->
                    <div class="card-body"> <!-- Body of the card -->
                        <h5 class="card-title">Malaysia Tour</h5> <!-- Title of the tour package -->
                        <p class="card-text">Discover the beauty of Malaysia’s natural landscapes and cities.</p> <!-- Description of the tour -->
                        <a href="{{ route('booking', ['destination' => 'Malaysia']) }}" class="btn btn-primary">Book Now</a> <!-- Booking button -->
                    </div>
                </div>
            </div>

            <!-- London Tour Package -->
            <div class="col-md-4 mb-4"> <!-- Column for the UK tour package -->
                <div class="card h-100"> <!-- Card to display package information -->
                    <img src="images/london.webp" class="card-img-top" alt="UK Tour" style="height: 200px; object-fit: fill;"> <!-- Image for UK tour -->
                    <div class="card-body"> <!-- Body of the card -->
                        <h5 class="card-title">UK Tour</h5> <!-- Title of the tour package -->
                        <p class="card-text">Enjoy a journey through UK’s historical sites and modern attractions.</p> <!-- Description of the tour -->
                        <a href="{{ route('booking', ['destination' => 'UK']) }}" class="btn btn-primary">Book Now</a> <!-- Booking button -->
                    </div>
                </div>
            </div>

            <!-- Paris Tour Package -->
            <div class="col-md-4 mb-4"> <!-- Column for the Italy tour package -->
                <div class="card h-100"> <!-- Card to display package information -->
                    <img src="images/paris.jpg" class="card-img-top" alt="Italy Tour" style="height: 200px; object-fit: fill;"> <!-- Image for Italy tour -->
                    <div class="card-body"> <!-- Body of the card -->
                        <h5 class="card-title">Italy Tour</h5> <!-- Title of the tour package -->
                        <p class="card-text">Immerse yourself in the architecture, culture and art of Italy.</p> <!-- Description of the tour -->
                        <a href="{{ route('booking', ['destination' => 'Italy']) }}" class="btn btn-primary">Book Now</a> <!-- Booking button -->
                    </div>
                </div>
            </div>

            <!-- Pakistan Tour Package -->
            <div class="col-md-4 mb-4"> <!-- Column for the Pakistan tour package -->
                <div class="card h-100"> <!-- Card to display package information -->
                    <img src="images/pakistan.jpg" class="card-img-top" alt="Pakistan Tour" style="height: 200px; object-fit: fill;"> <!-- Image for Pakistan tour -->
                    <div class="card-body"> <!-- Body of the card -->
                        <h5 class="card-title">Pakistan Tour</h5> <!-- Title of the tour package -->
                        <p class="card-text">Explore the breathtaking mountains and heritage of Pakistan.</p> <!-- Description of the tour -->
                        <a href="{{ route('booking', ['destination' => 'Pakistan']) }}" class="btn btn-primary">Book Now</a> <!-- Booking button -->
                    </div>
                </div>
            </div>

        </div> <!-- End of row for tour packages -->
    </div> <!-- End of main container -->
</div> <!-- End of background image container -->
</x-web-layout>

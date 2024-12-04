<x-web-layout>
    <body class="body">
        <!-- Set the background image inline style or in a class -->
        <div class="bg-image">
            <div class="container my-5">
                <h2 class="text-center mb-4">Tour Packages</h2>
                <div class="row">
                    @foreach ($packages as $package)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="{{ asset('images/' . $image[0]) }}" class="card-img-top" alt="{{ $package->name }}" style="height: 200px; object-fit: cover;">

                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $package->name }}</h5>
                                <p class="card-text">{{ $package->description }}</p>
                                <div class="d-flex justify-content-between mt-auto"> 
                                    <a href="{{ route('booking', ['destination' => $package->destination]) }}" class="btn btn-primary me-2">Book Now</a>
                                    <a href="{{ route('packages.details', $package->id) }}" class="btn btn-secondary">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
</x-web-layout>

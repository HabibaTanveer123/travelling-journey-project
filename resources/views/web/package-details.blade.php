<x-web-layout>
    <body class="body">
        <div class="bg-image">
            <div class="container my-5">
                <div class="itinerary-container">
                    <!-- Display Category Name -->
                    <h3 class="text-center text-muted mb-2">
                        Category: {{ $package->category->name ?? 'Uncategorized' }}
                    </h3>
                    
                    <!-- Display Package Name -->
                    <h2 class="text-center mb-4">
                        {{ $package->name }} - 7-Day Itinerary
                    </h2>
                    
                    <!-- Display Package Images -->
                    <div class="row mb-4">
                        @php
                            $images = is_string($package->images) ? json_decode($package->images, true) : $package->images;
                        @endphp
                        @if (is_array($images) && count($images) > 0)
                            @foreach ($images as $image)
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="{{ asset('storage/' . $image) }}" class="card-img-top" alt="{{ $package->name }}" style="height: 200px; object-fit: fill;">
                                </div>
                            </div>
                            @endforeach
                        @else
                            <p>No images available for this package.</p>
                        @endif
                    </div>

                    <!-- Display Itinerary -->
                    <ul class="list-group">
                        @php
                            $itinerary = is_string($package->itinerary) ? json_decode($package->itinerary, true) : $package->itinerary;
                        @endphp
                        @if (is_array($itinerary))
                            @foreach ($itinerary as $day => $detail)
                            <li class="list-group-item">
                                <strong>Day {{ $day + 1 }}:</strong> {{ $detail }}
                            </li>
                            @endforeach
                        @else
                            <p>No itinerary available for this package.</p>
                        @endif
                    </ul>
                    
                    <!-- Back Button -->
                    <a href="{{ route('packages') }}" class="btn btn-secondary mt-4">Back to Packages</a>
                </div>
            </div>
        </div>
    </body>
</x-web-layout>

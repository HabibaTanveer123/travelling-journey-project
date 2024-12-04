<x-web-layout>
    <body class="body">
        <div class="bg-image">
            <div class="container my-5">
                <div class="itinerary-container">
                    <h2 class="text-center mb-4">{{ $package->name }} - 7-Day</h2>
                    <div class="row mb-4">
                        @foreach ($package->images as $image)
                        <div class="col-md-4">
                            <div class="card">
                                <img src="{{ asset('images/' . $image) }}" class="card-img-top" alt="{{ $package->name }}" style="height: 200px; object-fit: fill;">
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <ul class="list-group">
                        @foreach ($package->itinerary as $day => $detail)
                        <li class="list-group-item">
                            <strong>Day {{ $day + 1 }}:</strong> {{ $detail }}
                        </li>
                        @endforeach
                    </ul>
                    <a href="{{ route('packages') }}" class="btn btn-secondary mt-4">Back to Packages</a>
                </div>
            </div>
        </div>
    </body>
</x-web-layout>

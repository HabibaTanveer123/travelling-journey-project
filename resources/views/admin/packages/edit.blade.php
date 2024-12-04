<x-web-layout>
    <div class="bg-image">
        <div class="container mt-4">
            <h1 style="text-align: center;">Edit Package</h1>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.packages.update', $package->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-container">
                    <div class="mb-3">
                        <label for="name" class="form-label">Package Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $package->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="destination" class="form-label">Destination</label>
                        <input type="text" class="form-control" id="destination" name="destination" value="{{ old('destination', $package->destination) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $package->description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="images" class="form-label">Images (JSON Array)</label>
                        <input type="text" class="form-control" id="images" name="images" value="{{ old('images', json_encode($package->images)) }}">
                    </div>

                    <div class="mb-3">
                        <label for="itinerary" class="form-label">Itinerary (JSON Array)</label>
                        <input type="text" class="form-control" id="itinerary" name="itinerary" value="{{ old('itinerary', json_encode($package->itinerary)) }}">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Update Package</button>
                        <a href="{{ route('admin.packages.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-web-layout>

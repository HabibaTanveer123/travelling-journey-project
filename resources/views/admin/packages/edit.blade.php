<x-web-layout>
    <div class="bg-image">
        <div class="container mt-4">
            <h1 style="text-align: center;">Edit Package</h1>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.packages.update', $package->id) }}" method="POST" enctype="multipart/form-data">
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
                        <label for="images" class="form-label">Images (Upload new images)</label>
                        <input type="file" class="form-control" id="images" name="images[]" multiple>
                        @if(is_array($package->images))
                            <div class="mt-3">
                                <h5>Existing Images:</h5>
                                @foreach($package->images as $image)
                                    <img src="{{ asset('storage/' . $image) }}" alt="Package Image" class="img-thumbnail" style="max-width: 150px; margin-right: 10px;">
                                @endforeach
                            </div>
                        @elseif($package->images)
                            <div class="mt-3">
                                <h5>Existing Images:</h5>
                                @foreach(json_decode($package->images) as $image)
                                    <img src="{{ asset('storage/' . $image) }}" alt="Package Image" class="img-thumbnail" style="max-width: 150px; margin-right: 10px;">
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="itinerary" class="form-label">Itinerary (JSON Array)</label>
                        <input type="text" class="form-control" id="itinerary" name="itinerary" value="{{ old('itinerary', json_encode($package->itinerary)) }}">
                    </div>

                    <!-- Category Dropdown -->
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-control" id="category" name="category_id" required>
                            <option value="" disabled>Select a Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" 
                                    {{ old('category_id', $package->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
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

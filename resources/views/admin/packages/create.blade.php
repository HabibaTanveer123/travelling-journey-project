<x-web-layout>
    <div class="bg-image">
        <div class="container mt-4">
            <h1 style="text-align: center;">Add New Package</h1>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.packages.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-container">
                    <div class="mb-3">
                        <label for="name" class="form-label">Package Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="destination" class="form-label">Destination</label>
                        <input type="text" class="form-control" id="destination" name="destination" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="images" class="form-label">Images</label>
                        <input type="file" class="form-control" id="images" name="images[]" multiple required>
                    </div>

                    <div class="mb-3">
                        <label for="itinerary" class="form-label">Itinerary</label>
                        <textarea class="form-control" id="itinerary" name="itinerary" rows="4" placeholder="Enter itinerary details, one per line" required></textarea>
                    </div>

                    <!-- Category Dropdown -->
                    <div class="mb-3">
    <label for="category" class="form-label">Category</label>
    <select class="form-control" id="category" name="category_id" required>
        <option value="" disabled selected>Select a Category</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" 
                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Save Package</button>
                        <a href="{{ route('admin.packages.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-web-layout>

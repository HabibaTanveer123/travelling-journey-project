<x-web-layout>
    <body class="body">
        <div class="bg-image">
            <div class="container my-5">
                <h2 class="text-center mb-4">Tour Packages</h2>
                
                <!-- Search by Category -->
                <form method="GET" action="{{ route('packages') }}" class="mb-4" id="categorySearchForm">
                    <div class="row g-2">
                        <div class="col-md-10">
                            <select name="category" class="form-select" id="categorySelect">
                                <option value="">All Categories</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $selectedCategory == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">Search</button>
                        </div>
                    </div>
                </form>

                <!-- No Packages Message -->
                @if($packages->isEmpty())
                    <div class="alert alert-warning text-center" role="alert">
                        No packages available for this category.
                    </div>
                @endif

                <!-- Packages Grid -->
                <div class="row">
                    @foreach ($packages as $package)
                        @php
                            $images = is_array($package->images) ? $package->images : json_decode($package->images, true);
                            $firstImage = $images[0] ?? null; // Safely access the first image
                        @endphp

                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                @if($firstImage)
                                    <img src="{{ asset('storage/' . $firstImage) }}" class="card-img-top" alt="{{ $package->name }}" style="height: 200px; object-fit: cover;">
                                @endif

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

    <script>
        // Handle search bar input event
        document.getElementById('searchBar').addEventListener('input', function () {
            let query = this.value;
            let categoryId = document.querySelector('select[name="category"]') ? document.querySelector('select[name="category"]').value : '';
            
            if (query.length > 0 || categoryId) {
                fetch(`{{ route('search') }}?query=${query}&category_id=${categoryId}`)
                    .then(response => response.json())
                    .then(data => {
                        let results = '';
                        
                        if (data.packages.length || data.categories.length) {
                            if (data.packages.length) {
                                results += '<h5>Packages</h5>';
                                data.packages.forEach(package => {
                                    results += `<li class="list-group-item"><a href="{{ url('packages') }}/${package.id}">${package.name}</a></li>`;
                                });
                            }

                            if (data.categories.length) {
                                results += '<h5>Categories</h5>';
                                data.categories.forEach(category => {
                                    results += `<li class="list-group-item category-item" data-category-id="${category.id}">${category.name}</li>`;
                                });
                            }
                        } else {
                            results = '<li class="list-group-item">No results found</li>';
                        }

                        const searchResults = document.getElementById('searchResults');
                        searchResults.innerHTML = results;
                        searchResults.style.display = results ? 'block' : 'none';
                    });
            } else {
                document.getElementById('searchResults').style.display = 'none';
            }
        });

        // Handle category item click in search results
        document.getElementById('searchResults').addEventListener('click', function (e) {
            if (e.target.classList.contains('category-item')) {
                const categoryId = e.target.getAttribute('data-category-id');
                document.getElementById('categorySelect').value = categoryId; // Set the selected category in the select dropdown
                document.getElementById('categorySearchForm').submit(); // Submit the form to filter packages
            }
        });
    </script>
</x-web-layout>

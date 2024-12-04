<x-web-layout>
<body class="body">

    <div class="bg-image">
        <div class="form-container">
            <h2 class="text-center">Booking Form</h2>
            <form class="card-body" method="POST" action="{{ route('store') }}">
                @csrf
                
                <div class="mb-3 w-100">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="mb-3 w-100">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3 w-100">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" name="phone" required>
                </div>

                <div class="mb-3 w-100">
                    <label for="people" class="form-label">Number of People</label>
                    <input type="number" id="people" name="people" class="form-control" min="1" value="1" required>
                </div>

                <div class="mb-3 w-100">
                    <label for="destination" class="form-label">Choose a Destination</label>
                    <select name="destination" id="destination" class="form-select" required onchange="updatePackageId()">
                        @foreach($packages as $package)
                            <option value="{{ $package->destination }}" data-package-id="{{ $package->id }}">
                                {{ $package->destination }}
                            </option>
                        @endforeach
                        <option value="Plan my own vacation" 
                            {{ old('destination', request()->query('destination')) == 'Plan my own vacation' ? 'selected' : '' }}>
                            Plan my own vacation
                        </option>
                    </select>
                </div>

                <!-- Hidden input to store the package_id -->
                <input type="hidden" id="package_id" name="package_id">

                <div class="mb-3 w-100">
                    <label for="date" class="form-label">Travel Date</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>

                <button type="submit" class="btn btn-primary w-100 mt-3">Submit Booking</button>
            </form>
        </div>
    </div>

    <script>
        // Function to update the hidden package_id input based on selected destination
        function updatePackageId() {
            const destinationSelect = document.getElementById('destination');
            const selectedOption = destinationSelect.options[destinationSelect.selectedIndex];
            const packageIdInput = document.getElementById('package_id');

            // Set the hidden input's value to the selected option's data-package-id
            packageIdInput.value = selectedOption.getAttribute('data-package-id');
        }

        // Call updatePackageId on page load to set initial value
        document.addEventListener('DOMContentLoaded', updatePackageId);
    </script>

</body>
</x-web-layout>

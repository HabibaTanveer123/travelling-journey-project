<x-web-layout>
    <div class="bg-image">
        <div class="container mt-4">
            <h1 style="text-align: center;">Edit Booking</h1>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Display Validation Errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Edit booking form -->
            <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-container">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $booking->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $booking->email) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $booking->phone) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="people" class="form-label">Number of People</label>
                        <input type="number" class="form-control" id="people" name="people" value="{{ old('people', $booking->people) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="destination" class="form-label">Destination</label>
                        <input type="text" class="form-control" id="destination" name="destination" value="{{ old('destination', $booking->destination) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="booking_date" class="form-label">Travel Date</label>
                        <input type="date" class="form-control" id="booking_date" name="booking_date" value="{{ old('booking_date', $booking->booking_date) }}" required>
                    </div>

                    <!-- Package Dropdown -->
                    <div class="mb-3">
                        <label for="package_id" class="form-label">Select Package</label>
                        <select name="package_id" class="form-control" id="package_id" required>
                            <option value="">Select a Package</option>
                            @foreach($packages as $package)
                                <option value="{{ $package->id }}" @if($package->id == $booking->package_id) selected @endif>
                                    {{ $package->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Update Booking</button>
                        <a href="{{ route('admin.packages.viewBookings') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-web-layout>

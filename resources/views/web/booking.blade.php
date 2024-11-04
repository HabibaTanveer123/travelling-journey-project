<x-web-layout>
<body class="body">

    <!-- Full height div with a background image -->
    <div class="bg-image">
        <!-- Container for the booking form -->
        <div class="form-container">
            <!-- Form heading centered at the top -->
            <h2 class="text-center">Booking Form</h2>
            <!-- Form -->
            <form class="card-body">
                <!-- Input fields and dropdowns for the form -->
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
                <label for="destination" class="form-label">Choose a Destination</label> <!-- Label for the select -->
                    <select name="destination" id="destination" class="form-select"> <!-- Styled select dropdown -->
                        <option value="Pakistan" {{ request('destination') == 'Pakistan' ? 'selected' : '' }}>Pakistan Tour</option>
                        <option value="Italy" {{ request('destination') == 'Italy' ? 'selected' : '' }}>Italy</option>
                        <option value="UK" {{ request('destination') == 'UK' ? 'selected' : '' }}>United Kingdom(UK)</option>
                        <option value="USA" {{ request('destination') == 'USA' ? 'selected' : '' }}>United States of America(USA)</option>
                        <option value="UAE" {{ request('destination') == 'UAE' ? 'selected' : '' }}>United Arab Emirates</option>
                        <option value="Malaysia" {{ request('destination') == 'Malaysia' ? 'selected' : '' }}>Malaysia</option>
                        <option value="Plan my own vacation" {{ request('destination') == 'Plan my own vacation' ? 'selected' : '' }}>Plan my own vacation</option>
                    </select>
                </div>
                <div class="mb-3 w-100">
                    <label for="date" class="form-label">Travel Date</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-3">Submit Booking</button>
            </form>
        </div>
    </div>

</body>
</html>
</x-web-layout>

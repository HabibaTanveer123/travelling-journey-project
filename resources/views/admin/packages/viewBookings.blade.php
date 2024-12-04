<x-web-layout>

    <div class="bg-image">
        <div class="container mt-4">

            <h2 style="text-align:center;">Bookings</h2>

            <!-- Form container with style similar to "Memories" -->
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Number of People</th>
                        <th>Destination</th>
                        <th>Package</th> <!-- New column for Package -->
                        <th>Travel Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->name }}</td>
                        <td>{{ $booking->email }}</td>
                        <td>{{ $booking->phone }}</td>
                        <td>{{ $booking->people }}</td>
                        <td>{{ $booking->destination }}</td>
                        <td>
                            <!-- Display package name if package_id is available -->
                            {{ optional($booking->package)->name ?? 'N/A' }}
                        </td>
                        <td>{{ $booking->booking_date }}</td>
                        <td>
                            <!-- Edit and Delete actions, styled similarly -->
                            <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="btn btn-info" style="margin-right: 10px;">Edit</a>
                            
                            <!-- Delete button with confirmation -->
                            <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // JavaScript function for delete confirmation
        function confirmDelete() {
            return confirm("Are you sure you want to delete this booking?");
        }
    </script>

</x-web-layout>

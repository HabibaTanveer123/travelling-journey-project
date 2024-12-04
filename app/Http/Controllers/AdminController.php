<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Booking;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Display the admin dashboard
    public function index()
    {
        $packages = Package::all(); // Fetch all packages from the database
        return view('admin.packages.index', compact('packages'));
    }

    // View all bookings
    public function viewBookings()
    {
        try {
            // Fetch all bookings along with their related package
            $bookings = Booking::with('package')->get(); // Eager load the related package
            return view('admin.packages.viewBookings', compact('bookings')); // Pass bookings to the view
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to load bookings: ' . $e->getMessage());
        }
    }

    // Show the form for editing a specific booking
    public function editBooking($id)
    {
        // Fetch the booking by ID
        $booking = Booking::findOrFail($id);
        
        // Fetch all available packages for the dropdown
        $packages = Package::all();
        
        // Return the edit booking view with booking data and available packages
        return view('admin.packages.editBooking', compact('booking', 'packages'));
    }

    // Update the specified booking in storage
    public function updateBooking(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'people' => 'required|integer',
            'destination' => 'required|string',
            'booking_date' => 'required|date',
            'package_id' => 'nullable|exists:packages,id', // Validate that the package_id exists in the packages table
        ]);

        // Find the booking by ID
        $booking = Booking::findOrFail($id);

        // Update the booking using mass assignment
        $booking->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'people' => $request->input('people'),
            'destination' => $request->input('destination'),
            'booking_date' => $request->input('booking_date'),
            'package_id' => $request->input('package_id'), // Update the package_id
        ]);

        // Redirect back to the bookings view with a success message
        return redirect()->route('admin.packages.viewBookings')->with('success', 'Booking updated successfully!');
    }

    // Delete a booking
    public function deleteBooking($id)
    {
        // Find the booking by ID
        $booking = Booking::findOrFail($id);
        
        // Delete the booking
        $booking->delete();

        // Redirect back to the bookings view with a success message
        return redirect()->route('admin.packages.viewBookings')->with('success', 'Booking deleted successfully!');
    }

    // Show the form for creating a new booking
    public function createBooking()
    {
        // Fetch all available packages for the dropdown
        $packages = Package::all();

        // Return the create booking view with available packages
        return view('admin.packages.createBooking', compact('packages'));
    }

    // Store a newly created booking in storage
    public function storeBooking(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'people' => 'required|integer',
            'destination' => 'required|string',
            'booking_date' => 'required|date',
            'package_id' => 'nullable|exists:packages,id', // Validate that the package_id exists in the packages table
        ]);

        // Store the new booking
        Booking::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'people' => $request->input('people'),
            'destination' => $request->input('destination'),
            'booking_date' => $request->input('booking_date'),
            'package_id' => $request->input('package_id'), // Store the package_id
        ]);

        // Redirect back to the bookings view with a success message
        return redirect()->route('admin.packages.viewBookings')->with('success', 'Booking created successfully!');
    }

    
}

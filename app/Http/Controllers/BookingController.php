<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Package;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // Show the form to create a new booking
    public function create()
    {
        // Fetch all available packages to display in the booking form
        $packages = Package::all();
        return view('web.bookings.create', compact('packages'));
    }

    // Store a new booking
    public function store(Request $request)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'people' => 'required|integer|min:1',
            'destination' => 'required|string',
            'date' => 'required|date',
            'package_id' => 'nullable|exists:packages,id', // Validate package ID if provided
        ]);

        // Save the booking in the database
        Booking::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'people' => $validatedData['people'],
            'destination' => $validatedData['destination'],
            'booking_date' => $validatedData['date'],
            'package_id' => $this->getPackageId($validatedData['destination'], $validatedData['package_id'] ?? null),
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Booking saved successfully!');
    }

    // Helper function to retrieve the package ID based on destination or default
    private function getPackageId($destination, $packageId)
    {
        // If a valid package ID is provided, return it
        if ($packageId) {
            return $packageId;
        }

        // Otherwise, find the package by destination (if applicable)
        $package = Package::where('destination', $destination)->first();
        return $package ? $package->id : null;
    }

    // Show the form to edit an existing booking
    public function edit($id)
    {
        // Find the booking by ID
        $booking = Booking::findOrFail($id);
        
        // Fetch all available packages to display in the edit form
        $packages = Package::all();
        
        // Return the edit view with booking data and available packages
        return view('admin.packages.editBooking', compact('booking', 'packages'));
    }

    // Update the booking with new data
    public function update(Request $request, $id)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'people' => 'required|integer|min:1',
            'destination' => 'required|string',
            'booking_date' => 'required|date',
            'package_id' => 'nullable|exists:packages,id', // Validate package ID if provided
        ]);

        // Find the booking by ID
        $booking = Booking::findOrFail($id);

        // Update the booking details
        $booking->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'people' => $validatedData['people'],
            'destination' => $validatedData['destination'],
            'booking_date' => $validatedData['booking_date'],
            'package_id' => $validatedData['package_id'] ?? null,
        ]);

        // Redirect to the view bookings page with success message
        return redirect()->route('admin.packages.viewBookings')->with('success', 'Booking updated successfully!');
    }

    // Delete a booking
    public function destroy($id)
{
    try {
        // Find the booking by ID and delete it
        $booking = Booking::findOrFail($id);
        $booking->delete();

        // Redirect to the view bookings page with a success message
        return redirect()->route('admin.packages.viewBookings')->with('success', 'Booking deleted successfully!');
    } catch (\Exception $e) {
        return redirect()->route('admin.packages.viewBookings')->with('error', 'Failed to delete booking: ' . $e->getMessage());
    }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Package;

class WebController extends Controller
{
    
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
          return redirect()->route('web.booking')->with('success', 'Booking created successfully!');
      }
    
    // Method to store booking data
//     public function storeBooking(Request $request)
// {
//     // Validate the form data
//     $request->validate([
//         'name' => 'required|string|max:255',
//         'email' => 'required|email|max:255',
//         'phone' => 'required|string|max:15',
//         'people' => 'required|integer',
//         'destination' => 'required|string',
//         'booking_date' => 'required|date',
//         'package_id' => 'nullable|exists:packages,id', // Validate that the package_id exists in the packages table
//     ]);

//     // Find the package based on the selected destination
//     $package = Package::where('destination', $request->destination)->first();

//     if (!$package) {
//         // Handle the case where no package is found for the given destination
//         return redirect()->route('booking')->with('error', 'No package found for this destination.');
//     }

//     // Create the booking
//     try {
//         Booking::create([
//             'name' => $request->name,
//             'email' => $request->email,
//             'phone' => $request->phone,
//             'people' => $request->people,
//             'destination' => $request->destination, // Store destination as entered
//             'booking_date' => $request->booking_date,
//             'package_id' => $package->id, // Link to the package_id
//         ]);

//         return redirect()->route('booking')->with('success', 'Booking made successfully!');
//     } catch (\Exception $e) {
//         \Log::error('Booking creation failed:', ['error' => $e->getMessage()]);
//         return redirect()->route('booking')->with('error', 'Failed to create booking. Please try again.');
//     }
// }

    // Method to show a specific package's details
    public function packageDetails($id)
    {
        $package = Package::findOrFail($id); // Retrieve the package by ID or throw 404 if not found
        return view('web.package-details', compact('package')); // Return the package details view
    }

    // Method to show the homepage
    public function index()
    {
        return view('web.index');
    }

    // Method to show the booking form
    public function booking()
    {
        // Fetch all packages created by the admin (to show in the dropdown)
        $packages = Package::all();  // You can add filters here if needed (like showing only admin-created packages)
        return view('web.booking', compact('packages'));  // Pass the packages to the booking view
    }

    // Method to show the list of packages
    public function packages()
    {
        $packages = Package::all();  // Fetch all packages from the database
        return view('web.packages.index', compact('packages'));  // Pass packages to the view
    }

    // Method to show the memories page
    public function memories()
    {
        return view('web.memories');
    }

    // Method to show the contact us page
    public function contactUs()
    {
        return view('web.contactUs');
    }
}

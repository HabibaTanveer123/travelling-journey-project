<?php

namespace App\Http\Controllers;

use App\Models\Package; // Import the Package model
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the packages in the admin panel.
     */
    public function index()
    {
        $packages = Package::all(); // Fetch all packages from the database
        return view('admin.packages.index', compact('packages')); // Pass packages to the admin view
    }

    /**
     * Display a listing of the packages on the frontend.
     */
    public function indexFrontend()
    {
        $packages = Package::all(); // Fetch all packages for frontend
        return view('web.packages.index', compact('packages')); // Pass packages to the frontend view
    }

    /**
     * Show the form for creating a new package.
     */
    public function create()
    {
        return view('admin.packages.create'); // Load the create package form
    }

    /**
     * Store a newly created package in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());

        // Validate form input
        $request->validate([
            'name' => 'required',
            'images' => 'required|image|mimes:jpg,png,jpeg|max:2048', // Validate image file
            'description' => 'required',
            'destination' => 'required',
        ]);

        // Store the uploaded image in the public storage
        $imagePath = $request->file('images')->store('images', 'public');

        // Create a new package with the provided data
        Package::create([
            'name' => $request->name,
            'images' => $imagePath,
            'description' => $request->description,
            'destination' => $request->destination,
        ]);

        return redirect()->route('admin.packages.index')->with('success', 'Package added successfully.');
    }

    /**
     * Display the specified package details on the frontend.
     */
    public function show($id)
    {
        $package = Package::findOrFail($id); // Find package by ID or fail
        return view('web.packages.details', compact('package')); // Show package details
    }

    /**
     * Show the form for editing the specified package.
     */
    public function edit(Package $package)
    {
        return view('admin.packages.edit', compact('package')); // Load the edit package form
    }

    /**
     * Update the specified package in storage.
     */
    public function update(Request $request, Package $package)
    {
        // Validate form input
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'destination' => 'required',
            'images' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Image is optional
        ]);

        // Update image if a new one is uploaded
        if ($request->hasFile('images')) {
            $imagePath = $request->file('images')->store('images', 'public');
            $package->images = $imagePath;
        }

        // Update package data
        $package->update([
            'name' => $request->name,
            'description' => $request->description,
            'destination' => $request->destination,
        ]);

        return redirect()->route('admin.packages.index')->with('success', 'Package updated successfully.');
    }

    /**
     * Remove the specified package from storage.
     */
    public function destroy(Package $package)
    {
        $package->delete(); // Delete the package
        return redirect()->route('admin.packages.index')->with('success', 'Package deleted successfully.');
    }
}

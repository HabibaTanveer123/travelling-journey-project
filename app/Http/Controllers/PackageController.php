<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PackageController extends Controller
{
    public function index(Request $request)
    {
        $packages = Package::all();
        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        $categories = Category::all(); // Fetch all categories
        return view('admin.packages.create', compact('categories')); // Pass categories to the view
    }

    public function store(Request $request)
{
    // Validate the form data
    $request->validate([
        'name' => 'required|string|max:255',
        'destination' => 'required|string|max:255',
        'description' => 'required|string',
        'itinerary' => 'required|string',
        'images.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image types and size
        'category_id' => 'required|exists:categories,id',
    ]);

    // Handle the file upload and other logic here
    $package = new Package();
    $package->name = $request->name;
    $package->destination = $request->destination;
    $package->description = $request->description;
    $package->itinerary = $request->itinerary;
    $package->category_id = $request->category_id;

    // Handle multiple images
    if ($request->hasFile('images')) {
        $images = $request->file('images');
        $imagePaths = [];

        foreach ($images as $image) {
            // Store the image and get the path
            $path = $image->store('images', 'public');
            $imagePaths[] = $path;
        }

        $package->images = json_encode($imagePaths); // Store image paths in a JSON format
    }

    $package->save();

    return redirect()->route('admin.packages.index')->with('success', 'Package added successfully');
}

    public function show($id)
    {
        $package = Package::findOrFail($id);

        // Decode images and itinerary for display
        $package->images = json_decode($package->images, true);
        $package->itinerary = json_decode($package->itinerary, true);

        return view('web.packages.details', compact('package'));
    }

    public function edit(Package $package)
    {
        $categories = Category::all(); // Fetch all categories
        $package->images = json_decode($package->images, true); // Decode images for the edit form

        return view('admin.packages.edit', compact('package', 'categories'));
    }

    public function update(Request $request, Package $package)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'destination' => 'required',
            'category_id' => 'required|exists:categories,id',
            'images.*' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $imagePaths = json_decode($package->images, true) ?? [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('images', 'public');
            }
        }

        $itinerary = $request->itinerary ? json_decode($request->itinerary, true) : json_decode($package->itinerary, true);

        $package->update([
            'name' => $request->name,
            'description' => $request->description,
            'destination' => $request->destination,
            'category_id' => $request->category_id,
            'images' => json_encode($imagePaths),
            'itinerary' => json_encode($itinerary),
        ]);

        return redirect()->route('admin.packages.index')->with('success', 'Package updated successfully.');
    }

    public function destroy(Package $package)
    {
        // Delete the images from storage
        $images = json_decode($package->images, true) ?? [];
        foreach ($images as $imagePath) {
            Storage::disk('public')->delete($imagePath);
        }

        // Delete the package
        $package->delete();

        return redirect()->route('admin.packages.index')->with('success', 'Package deleted successfully.');
    }

    public function getPackagesByCategory(Request $request)
     {
        $selectedCategory = $request->get('category'); // Retrieve selected category from query
        $categories = Category::all(); // Get all categories for the dropdown

        // Fetch packages by selected category, or fetch all if no category is selected
        $packages = $selectedCategory 
            ? Package::where('category_id', $selectedCategory)->get() 
            : Package::all();

        return view('web.packages.index', compact('packages', 'categories', 'selectedCategory'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Services\PackageService;
use App\Models\Package;
use App\Models\Category;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    protected $packageService;

    public function __construct(PackageService $packageService)
    {
        $this->packageService = $packageService;
    }

    public function index()
    {
        $packages = $this->packageService->getAllPackages();
        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.packages.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'description' => 'required|string',
            'itinerary' => 'required|string',
            'images.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $this->packageService->createPackage($request->all());
        return redirect()->route('admin.packages.index')->with('success', 'Package added successfully.');
    }

    public function edit(Package $package)
    {
        $categories = Category::all();
        $package->images = json_decode($package->images, true);
        return view('admin.packages.edit', compact('package', 'categories'));
    }

    public function update(Request $request, Package $package)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'images.*' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $this->packageService->updatePackage($package, $request->all());
        return redirect()->route('admin.packages.index')->with('success', 'Package updated successfully.');
    }

    public function destroy(Package $package)
    {
        $this->packageService->deletePackage($package);
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

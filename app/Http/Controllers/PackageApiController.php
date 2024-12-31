<?php

namespace App\Http\Controllers;

use App\Services\PackageService;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageApiController extends Controller
{
    protected $packageService;

    public function __construct(PackageService $packageService)
    {
        $this->packageService = $packageService;
    }

    public function index()
    {
        $packages = $this->packageService->getAllPackages();
        return response()->json($packages);
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

        $package = $this->packageService->createPackage($request->all());
        return response()->json($package, 201);
    }

    public function show($id)
    {
        $package = $this->packageService->getPackageById($id);
        return response()->json($package);
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

        $updatedPackage = $this->packageService->updatePackage($package, $request->all());
        return response()->json($updatedPackage);
    }

    public function destroy(Package $package)
    {
        $this->packageService->deletePackage($package);
        return response()->json(['message' => 'Package deleted successfully.']);
    }
}

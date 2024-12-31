<?php

namespace App\Services;

use App\Models\Package;
use Illuminate\Support\Facades\Storage;

class PackageService
{
    public function getAllPackages()
    {
        return Package::all();
    }

    public function getPackageById($id)
    {
        return Package::findOrFail($id);
    }

    public function createPackage($data)
    {
        $package = new Package();
        $package->name = $data['name'];
        $package->destination = $data['destination'];
        $package->description = $data['description'];
        $package->itinerary = $data['itinerary'];
        $package->category_id = $data['category_id'];

        if (isset($data['images'])) {
            $imagePaths = [];
            foreach ($data['images'] as $image) {
                $path = $image->store('images', 'public');
                $imagePaths[] = $path;
            }
            $package->images = json_encode($imagePaths);
        }

        $package->save();
        return $package;
    }

    public function updatePackage($package, $data)
    {
        $package->name = $data['name'];
        $package->destination = $data['destination'];
        $package->description = $data['description'];
        $package->category_id = $data['category_id'];

        $imagePaths = json_decode($package->images, true) ?? [];

        if (isset($data['images'])) {
            foreach ($data['images'] as $image) {
                $imagePaths[] = $image->store('images', 'public');
            }
        }

        $package->images = json_encode($imagePaths);
        $package->save();

        return $package;
    }

    public function deletePackage($package)
    {
        $images = json_decode($package->images, true) ?? [];
        foreach ($images as $imagePath) {
            Storage::disk('public')->delete($imagePath);
        }

        $package->delete();
        return true;
    }
}

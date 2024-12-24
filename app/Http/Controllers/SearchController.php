<?php
namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Category;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    // Search for packages by name or categories
    public function search(Request $request)
    {
        $query = $request->input('query'); // Get the search query
        $categoryId = $request->input('category_id'); // Get the selected category ID

        // Determine if we're searching for packages or categories
        if ($request->has('query') && !$categoryId) {
            // If there's a query but no category ID, search for packages by name
            $packages = Package::where('name', 'like', "%$query%")->get();
            $categories = []; // No need to fetch categories in this case
        } elseif ($categoryId) {
            // If there's a category selected, search for categories by name
            $categories = Category::where('name', 'like', "%$query%")->get();
            $packages = []; // No need to fetch packages in this case
        } else {
            // If no query is set, return all packages and categories
            $packages = Package::all();
            $categories = Category::all();
        }

        // Return the results as JSON
        return response()->json([
            'packages' => $packages,
            'categories' => $categories,
        ]);
    }
}

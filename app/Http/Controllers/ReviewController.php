<?php
namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // Show all reviews
    public function index()
    {
        // Fetch all reviews
        $reviews = Review::all(); // You can modify this to filter by user if needed

        // Pass the reviews to the view
        return view('web.memories', compact('reviews'));
    }

    // Store a new review
    public function store(Request $request)
{
    $request->validate([
        'review' => 'required|string|max:1000',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Handle image upload
    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');  // Store in storage/images
    }

    // Store the review in the database
    Review::create([
        'review' => $request->review,
        'image' => $imagePath,  // Store the image path
    ]);

    // Redirect back to the reviews page
    return redirect()->route('memories')->with('success', 'Review added successfully!');
}
}

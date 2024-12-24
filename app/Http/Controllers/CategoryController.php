<?php

namespace App\Http\Controllers;
use App\Models\Packages;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all(); // Get all categories
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create'); // Show the form to create a category
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255', // Validate the name
        ]);

        Category::create($request->all()); // Create a new category
        return redirect()->route('admin.categories.index')->with('success', 'Category added successfully!');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category')); // Show the form to edit a category
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255', // Validate the name
        ]);

        $category->update($request->all()); // Update the category
        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully!');
    }

    public function destroy(Category $category)
    {
        $category->delete(); // Delete the category
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully!');
    }
}


<?php

namespace App\Http\Controllers;

// Import the base Controller class
use App\Http\Controllers\Controller; 

use App\Models\Category;
use App\Models\Product; 
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str; // Useful for generating slug

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('products')->latest()->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id',
            'icon' => 'nullable|string|max:10',
            'is_active' => 'boolean',
        ]);

        // 2. Set default values
        $validatedData['is_active'] = $request->has('is_active');

        // 3. Create and save the new category
        Category::create($validatedData);

        return redirect()->route('admin.categories.index')
                         ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // 1. Validate the incoming request data
        $validatedData = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                // Ensure name is unique, but ignore the current category's name
                Rule::unique('categories')->ignore($category->id),
            ],
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id',
            'icon' => 'nullable|string|max:10',
            'is_active' => 'boolean',
        ]);

        // 2. Set default values
        $validatedData['is_active'] = $request->has('is_active');

        // 3. Update the category
        $category->update($validatedData);

        return redirect()->route('admin.categories.index')
                         ->with('success', 'Category updated successfully.');
    }

    /**
     * Toggle the active status of a category.
     */
    public function toggleActive(Category $category)
    {
        $category->update(['is_active' => !$category->is_active]);

        $status = $category->is_active ? 'activated' : 'deactivated';

        return redirect()->route('admin.categories.index')
                         ->with('success', "Category {$status} successfully.");
    }

    /**
     * Remove the specified resource from storage.
     * * IMPORTANT: This method ensures all linked products are unassigned
     * (their category_id is set to NULL) before the category is deleted.
     * Also handles hierarchical deletion of subcategories.
     */
    public function destroy(Category $category)
    {
        // 1. Recursively delete all subcategories and their products
        $this->deleteCategoryAndChildren($category);

        return redirect()->route('admin.categories.index')
                         ->with('success', 'Category and all subcategories deleted successfully. All linked products have been unassigned.');
    }

    /**
     * Recursively delete a category and all its children.
     */
    private function deleteCategoryAndChildren(Category $category)
    {
        // Delete all children first
        foreach ($category->children as $child) {
            $this->deleteCategoryAndChildren($child);
        }

        // Set the 'category_id' to NULL for all associated products
        Product::where('category_id', $category->id)->update(['category_id' => null]);

        // Delete the category itself
        $category->delete();
    }
}
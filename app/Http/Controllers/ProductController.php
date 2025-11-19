<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category; // <-- ADD THIS LINE
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // NEW (Eager Loading):
    $products = Product::with('category')->latest()->paginate(10);

    return view('admin.products.index', compact('products'));

    }

    /**
     * Display a listing of the products.
     */
    public function shop(Request $request)
    {
        try {
            // Handle search and filters
            $query = Product::with('category');

        // Text search
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%')
                  ->orWhereHas('category', function($categoryQuery) use ($search) {
                      $categoryQuery->where('name', 'like', '%' . $search . '%');
                  });
            });
        }

        // Category filter
        if ($request->has('category') && !empty($request->category)) {
            $selectedCategory = Category::find($request->category);
            if ($selectedCategory) {
                // If it's a parent category, include products from parent and all child categories
                if ($selectedCategory->parent_id === null) {
                    $childCategoryIds = $selectedCategory->children()->pluck('id')->toArray();
                    $categoryIds = array_merge([$selectedCategory->id], $childCategoryIds);
                    $query->whereIn('category_id', $categoryIds);
                } else {
                    // If it's a child category, just filter by that category
                    $query->where('category_id', $request->category);
                }
            }
        }

        // Price range filters
        if ($request->has('min_price') && !empty($request->min_price)) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->has('max_price') && !empty($request->max_price)) {
            $query->where('price', '<=', $request->max_price);
        }

        // Stock status filter
        if ($request->has('stock_status') && !empty($request->stock_status)) {
            switch ($request->stock_status) {
                case 'in_stock':
                    $query->where('stock', '>', 10);
                    break;
                case 'low_stock':
                    $query->where('stock', '>', 0)->where('stock', '<=', 10);
                    break;
                case 'out_of_stock':
                    $query->where('stock', '=', 0);
                    break;
            }
        }

        // Quick filters
        if ($request->has('in_stock_only') && $request->in_stock_only) {
            $query->where('stock', '>', 0);
        }

        if ($request->has('on_sale') && $request->on_sale) {
            $query->where('price', '>', 0); // You can add a sale_price column later
        }

        if ($request->has('new_arrivals') && $request->new_arrivals) {
            $query->where('created_at', '>=', now()->subDays(30)); // Products from last 30 days
        }

        // Sorting
        if ($request->has('sort') && !empty($request->sort)) {
            switch ($request->sort) {
                case 'newest':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'oldest':
                    $query->orderBy('created_at', 'asc');
                    break;
                case 'price-low':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price-high':
                    $query->orderBy('price', 'desc');
                    break;
                case 'name-asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name-desc':
                    $query->orderBy('name', 'desc');
                    break;
                default:
                    $query->latest();
            }
        } else {
            $query->latest();
        }

        // Group products by category for display (include both parent and child categories)
        $productsByCategory = [];

        // Get all categories (both parents and children) that have products
        $allCategories = \App\Models\Category::active()
            ->with(['products' => function($q) use ($query) {
                $q->whereIn('id', $query->pluck('id'));
            }])
            ->orderBy('parent_id') // Parents first (null parent_id), then children
            ->orderBy('name')
            ->get()
            ->filter(function($category) {
                return $category->products->count() > 0;
            });

        foreach ($allCategories as $category) {
            $productsByCategory[] = [
                'category' => $category,
                'products' => $category->products
            ];
        }

        // For pagination when no category filter
        $perPage = $request->get('per_page', 12);
        $products = $query->paginate($perPage);

            return view('shop.index', compact('products', 'productsByCategory'));
        } catch (\Exception $e) {
            // Log the error and return a simple error page
            \Log::error('Shop page error: ' . $e->getMessage());
            return response('Error loading shop page: ' . $e->getMessage(), 500);
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          $categories = Category::all();
    return view('admin.products.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validate
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = $request->except('image');

        // 2. Handle file upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $data['image'] = $path;
        }

        // 3. Create
        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->load('category');
        return view('admin.products.show', compact('product'));
    }

    /**
     * Display the specified product for public view.
     */
    public function publicShow(Product $product)
    {
        $product->load('category');
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
    return view('admin.products.edit', compact('product', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // 1. Validate
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = $request->except('image');

        // 2. Handle file upload
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $path = $request->file('image')->store('products', 'public');
            $data['image'] = $path;
        }

        // 3. Update
        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Get search suggestions for autocomplete.
     */
    public function searchSuggestions(Request $request)
    {
        $query = $request->get('q', '');

        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $suggestions = Product::where('name', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->orWhereHas('category', function($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%');
            })
            ->with('category')
            ->limit(8)
            ->get()
            ->map(function($product) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'image' => $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/300?text=' . urlencode($product->name),
                    'category' => $product->category->name ?? 'Uncategorized',
                    'url' => route('products.show', $product)
                ];
            });

        return response()->json($suggestions);
    }

    /**
     * API endpoint for filtered products.
     */
    public function apiProducts(Request $request)
    {
        // Handle search and filters
        $query = Product::with('category');

        // Text search
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%')
                  ->orWhereHas('category', function($categoryQuery) use ($search) {
                      $categoryQuery->where('name', 'like', '%' . $search . '%');
                  });
            });
        }

        // Category filter
        if ($request->has('category') && !empty($request->category)) {
            $selectedCategory = Category::find($request->category);
            if ($selectedCategory) {
                // If it's a parent category, include products from parent and all child categories
                if ($selectedCategory->parent_id === null) {
                    $childCategoryIds = $selectedCategory->children()->pluck('id')->toArray();
                    $categoryIds = array_merge([$selectedCategory->id], $childCategoryIds);
                    $query->whereIn('category_id', $categoryIds);
                } else {
                    // If it's a child category, just filter by that category
                    $query->where('category_id', $request->category);
                }
            }
        }

        // Price range filters
        if ($request->has('min_price') && !empty($request->min_price)) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->has('max_price') && !empty($request->max_price)) {
            $query->where('price', '<=', $request->max_price);
        }

        // Stock status filter
        if ($request->has('stock_status') && !empty($request->stock_status)) {
            switch ($request->stock_status) {
                case 'in_stock':
                    $query->where('stock', '>', 10);
                    break;
                case 'low_stock':
                    $query->where('stock', '>', 0)->where('stock', '<=', 10);
                    break;
                case 'out_of_stock':
                    $query->where('stock', '=', 0);
                    break;
            }
        }

        // Quick filters
        if ($request->has('in_stock_only') && $request->in_stock_only) {
            $query->where('stock', '>', 0);
        }

        if ($request->has('on_sale') && $request->on_sale) {
            $query->where('price', '>', 0); // You can add a sale_price column later
        }

        if ($request->has('new_arrivals') && $request->new_arrivals) {
            $query->where('created_at', '>=', now()->subDays(30)); // Products from last 30 days
        }

        // Sorting
        if ($request->has('sort') && !empty($request->sort)) {
            switch ($request->sort) {
                case 'newest':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'oldest':
                    $query->orderBy('created_at', 'asc');
                    break;
                case 'price-low':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price-high':
                    $query->orderBy('price', 'desc');
                    break;
                case 'name-asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name-desc':
                    $query->orderBy('name', 'desc');
                    break;
                default:
                    $query->latest();
            }
        } else {
            $query->latest();
        }

        $perPage = $request->get('per_page', 12);
        $products = $query->paginate($perPage);

        // Format for JSON response
        $formattedProducts = $products->map(function($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price,
                'stock' => $product->stock,
                'image' => $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/300?text=' . urlencode($product->name),
                'category' => $product->category->name ?? 'Uncategorized',
                'url' => route('products.show', $product)
            ];
        });

        return response()->json([
            'products' => $formattedProducts,
            'pagination' => [
                'current_page' => $products->currentPage(),
                'last_page' => $products->lastPage(),
                'per_page' => $products->perPage(),
                'total' => $products->total()
            ]
        ]);
    }

    /**
     * Handle contact message submission.
     */
    public function sendMessage(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // Here you would typically send an email or save to database
        // For now, we'll just return success
        // You can implement email sending using Laravel's Mail facade

        return response()->json([
            'success' => true,
            'message' => 'Message sent successfully! We\'ll get back to you soon.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
         // Delete image if present
     if ($product->image) {
          Storage::disk('public')->delete($product->image);
     }

     $product->delete();

     return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }

    /**
     * Display user's favorite products.
     */
    public function favorites()
    {
        $favorites = auth()->user()->favoriteProducts()->with('category')->paginate(12);
        return view('favorites.index', compact('favorites'));
    }

    /**
     * Toggle favorite status for a product.
     */
    public function toggleFavorite(Product $product)
    {
        $user = auth()->user();

        if ($user->favoriteProducts()->where('product_id', $product->id)->exists()) {
            $user->favoriteProducts()->detach($product->id);
            $message = 'Product removed from favorites';
            $isFavorited = false;
        } else {
            $user->favoriteProducts()->attach($product->id);
            $message = 'Product added to favorites';
            $isFavorited = true;
        }

        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'is_favorited' => $isFavorited
            ]);
        }

        return back()->with('success', $message);
    }
}
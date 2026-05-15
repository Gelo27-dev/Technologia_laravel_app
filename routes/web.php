<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController; 
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;


Route::get('/', function () {
    $featuredProducts = \App\Models\Product::with('category')->latest()->take(12)->get();
    return view('welcome', compact('featuredProducts'));
});

Route::get('/design-system', function () {
    return view('design-system');
})->name('design-system');

Route::get('/shop', [ProductController::class, 'shop'])->name('shop.index');
Route::get('/products/{product}', [ProductController::class, 'publicShow'])->name('products.show');
Route::get('/api/search-suggestions', [ProductController::class, 'searchSuggestions'])->name('api.search-suggestions');
Route::get('/api/products', [ProductController::class, 'apiProducts'])->name('api.products');
Route::post('/contact/message', [ProductController::class, 'sendMessage'])->name('contact.message');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');
Route::patch('/cart/{rowId}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{rowId}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

// Public route for shared orders via signed URLs
Route::get('/order/{order}', [OrderController::class, 'publicShow'])->name('order.show')->middleware('signed');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/orders', [OrderController::class, 'userIndex'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'userShow'])->name('orders.show');

    // Favorites/Wishlist routes
    Route::get('/favorites', [ProductController::class, 'favorites'])->name('favorites.index');
    Route::post('/favorites/toggle/{product}', [ProductController::class, 'toggleFavorite'])->name('favorites.toggle');

    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

    // Share order route
    Route::get('/share/order/{order}', function ($order) {
        // Generate a secure, temporary URL that expires in 30 minutes
        $url = URL::temporarySignedRoute(
            'order.show', now()->addMinutes(30), ['order' => $order]
        );
        return view('share', ['share_link' => $url]);
    })->name('order.share');
});

Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::patch('categories/{category}/toggle-active', [CategoryController::class, 'toggleActive'])->name('categories.toggle-active');

    // Users Management
    Route::get('/users', [AdminController::class, 'users'])->name('users.index');
    Route::get('/users/{user}', [AdminController::class, 'show'])->name('users.show');
    Route::patch('/users/{user}/toggle-active', [AdminController::class, 'toggleActive'])->name('users.toggleActive');
    Route::patch('/users/{user}/toggle-admin', [AdminController::class, 'toggleAdmin'])->name('users.toggleAdmin');

    // Orders
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [AdminOrderController::class, 'show'])->name('orders.show');
    Route::patch('/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('orders.updateStatus');
    Route::delete('/orders/{order}', [AdminOrderController::class, 'destroy'])->name('orders.destroy');
});

require __DIR__.'/auth.php';

// Temporary route to make a user admin for Angelo Tud
use App\Models\User;
use Illuminate\Http\Request;

Route::get('/temp/make-admin', function(Request $request) {
    $email = $request->query('email');
    $secret = $request->query('secret');

    // Replace this with a secret key only you know
    $expectedSecret = 'temporarySecureKey123';

    if ($secret !== $expectedSecret) {
        return response('Unauthorized', 401);
    }

    if (!$email) {
        return response('Email is required', 400);
    }

    $user = User::where('email', $email)->first();
    if (!$user) {
        return response('User not found', 404);
    }

    $user->is_admin = 1;
    $user->save();

    return response("User {$user->name} ({$user->email}) is now an admin.");
});

Route::get('/temp/create-admin', function(Request $request) {
    $name = $request->query('name');
    $email = $request->query('email');
    $password = $request->query('password');
    $secret = $request->query('secret');

    $expectedSecret = 'temporarySecureKey123';

    if ($secret !== $expectedSecret) {
        return response('Unauthorized', 401);
    }

    if (!$name || !$email || !$password) {
        return response('Name, email and password are required', 400);
    }

    $existingUser = User::where('email', $email)->first();
    if ($existingUser) {
        return response('User with this email already exists', 409);
    }

    $user = new User();
    $user->name = $name;
    $user->email = $email;
    $user->password = bcrypt($password);
    $user->is_admin = 1;
    $user->save();

    return response("New admin user {$user->name} ({$user->email}) created successfully.");
});

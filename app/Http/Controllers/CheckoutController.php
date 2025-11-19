<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart; 

class CheckoutController extends Controller
{

    public function index()
    {
        // If cart is empty, redirect back to shop
        if (Cart::count() == 0) {
            return redirect()->route('shop.index')->with('error', 'Your cart is empty.');
        }

        $user = Auth::user(); 
        $cartItems = Cart::content();
        $cartTotal = Cart::total();
        
        return view('checkout.index', compact('cartTotal', 'user', 'cartItems'));
    }

    public function store(Request $request)
    {
        // 1. Validate the form data
        $request->validate([
            'shipping_name' => 'required|string|max:255',
            'shipping_address' => 'required|string|max:255',
            'shipping_city' => 'required|string|max:255',
            'shipping_phone' => 'required|string|max:20', 
        ]);

        // 2. Check stock and start a database transaction
        try {
            DB::beginTransaction();

            // Check stock for every item in cart
            foreach (Cart::content() as $item) {
                $product = Product::findOrFail($item->id); 
                if ($product->stock < $item->qty) {
                    DB::rollBack();
                    return redirect()->route('cart.index')->with('error', 'The product "' . $product->name . '" does not have enough stock.');
                }
            }

            // 3. Create the Order
            $order = Order::create([
                'user_id' => Auth::id(),
                // NOTE: Cart::total(2, '.', '') returns a STRING. Ensure your 'total_price' column in the database is set to DECIMAL or DOUBLE.
                'total_price' => Cart::total(2, '.', ''), 
                'status' => 'pending',
                'shipping_name' => $request->shipping_name,
                'shipping_address' => $request->shipping_address,
                'shipping_city' => $request->shipping_city,
                'shipping_phone' => $request->shipping_phone,
            ]);

            // 4. Create the Order Items (pivot table) and update stock
            foreach (Cart::content() as $item) {
                // Attach the product to the order (This creates the OrderItem record)
                // This assumes you have a Many-to-Many relationship defined in Order Model: public function products() { return $this->belongsToMany(Product::class)->withPivot('quantity', 'price'); }
                $order->products()->attach($item->id, [
                    'quantity' => $item->qty,
                    'price' => $item->price,
                ]);

                // Update the product's stock
                $product = Product::findOrFail($item->id);
                $product->stock -= $item->qty;
                $product->save();
            }

            // 5. Commit the transaction
            DB::commit();

            // 6. Clear the cart
            Cart::destroy();

            // 7. Redirect to a "thank you" page
            return redirect()->route('dashboard')->with('success', 'Order placed successfully! Thank you for your purchase.');

        } catch (\Exception $e) {
            // If anything goes wrong, roll back
            DB::rollBack();

            // --- FIX: LOG THE ERROR TO FIND THE ROOT CAUSE ---
            Log::error("Order Placement Failed: " . $e->getMessage(), ['exception' => $e]);
            
            return redirect()->route('checkout.index')->with('error', 'An error occurred while placing your order. Please try again.');
        }
    }
}
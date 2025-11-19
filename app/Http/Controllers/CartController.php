<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;  
use Illuminate\Validation\ValidationException;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'product_id' => 'required|integer|exists:products,id',
                'quantity' => 'sometimes|integer|min:1',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid product selected.',
                'errors' => $e->errors()
            ], 422);
        }

        $product = Product::findOrFail($request->product_id);

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->quantity ?? 1,
            'price' => $product->price,
            'options' => [],
        ])->associate(Product::class);

       return back()->with('success', $product->name . ' has been added to your cart!');
        
    }

    public function update(Request $request, $rowId)
    {
        $request->validate(['quantity' => 'required|integer|min:1']);
        Cart::update($rowId, $request->quantity);
        return redirect()->route('cart.index')->with('success', 'Cart item quantity updated!');
    }

    public function destroy($rowId)
    {
        Cart::remove($rowId);
        return redirect()->route('cart.index')->with('success', 'Product removed from cart.');
    }

    public function clear()
    {
        Cart::destroy();
        return redirect()->route('cart.index')->with('success', 'Cart cleared.');
    }
}

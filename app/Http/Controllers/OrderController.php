<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display user's orders (user-facing).
     */
    public function userIndex()
    {
        $orders = Auth::user()->orders()->orderBy('created_at', 'desc')->get();
        return view('orders.index', compact('orders'));
    }

    /**
     * Display user's specific order details.
     */
    public function userShow(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }
        return view('orders.show', compact('order'));
    }

    /**
     * Display order details publicly via signed URL.
     */
    public function publicShow(Order $order)
    {
        return view('orders.show', compact('order'));
    }
}
@extends('admin.admin_layout')

@section('title', 'Order Details')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-[#f0f0f0]">Order Details</h1>
        <a href="{{ route('admin.orders.index') }}" class="px-4 py-2 bg-[#ff4500] text-white rounded-lg font-semibold hover:bg-[#ff5a1a] transition duration-300">
            Back to Orders
        </a>
    </div>
                    <div class="flex justify-between items-center mb-8 pb-6 border-b border-gray-700">
                        <h3 class="text-3xl font-bold text-[var(--color-store-text)]">Order #{{ $order->id }}</h3>
                        <div class="text-right">
                            <span class="text-xs font-semibold text-white uppercase">Status:</span>
                            @if (in_array($order->status, ['completed', 'delivered', 'shipped']))
                                <span class="px-4 py-2 inline-flex text-sm leading-5 font-semibold rounded-full bg-green-900/30 text-green-300 border border-green-700">
                                    {{ ucfirst($order->status) }}
                                </span>
                            @elseif ($order->status === 'cancelled')
                                <span class="px-4 py-2 inline-flex text-sm leading-5 font-semibold rounded-full bg-red-900/30 text-red-300 border border-red-700">
                                    {{ ucfirst($order->status) }}
                                </span>
                            @else
                                <span class="px-4 py-2 inline-flex text-sm leading-5 font-semibold rounded-full bg-yellow-900/30 text-yellow-300 border border-yellow-700">
                                    {{ ucfirst($order->status) }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 pb-8 border-b border-gray-700">
                        <div class="bg-gray-800 p-4 rounded-lg border border-gray-700">
                            <h4 class="text-sm font-semibold text-white uppercase mb-3">Customer Information</h4>
                            <p class="text-[var(--color-store-text)] font-medium">{{ $order->user->name }}</p>
                            <p class="text-white text-sm">{{ $order->user->email }}</p>
                        </div>
                        <div class="bg-gray-800 p-4 rounded-lg border border-gray-700">
                            <h4 class="text-sm font-semibold text-white uppercase mb-3">Shipping Address</h4>
                            <p class="text-[var(--color-store-text)] font-medium">{{ $order->shipping_name }}</p>
                            <p class="text-white text-sm">{{ $order->shipping_address }}</p>
                            <p class="text-white text-sm">{{ $order->shipping_city }}, {{ $order->shipping_zip }}</p>
                        </div>
                        <div class="bg-gray-800 p-4 rounded-lg border border-gray-700">
                            <h4 class="text-sm font-semibold text-white uppercase mb-3">Order Summary</h4>
                            <p class="text-white text-sm mb-2">
                                <strong>Date Placed:</strong> {{ $order->created_at->format('M d, Y') }}
                            </p>
                            <p class="text-white text-sm mb-2">
                                <strong>Payment:</strong> {{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}
                            </p>
                            <p class="text-lg font-bold text-white">
                                Total: ${{ number_format($order->total_price, 2) }}
                            </p>
                        </div>
                    </div>

                    <h4 class="text-lg font-semibold text-[var(--color-store-text)] mb-4">Items Ordered</h4>
                    <div class="overflow-x-auto mb-8">
                        <table class="min-w-full">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Product</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Quantity</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Price</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Total</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-700">
                                @foreach ($order->products as $product)
                                    <tr class="hover:bg-gray-800 transition">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[var(--color-store-text)]">{{ $product->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-white">{{ $product->pivot->quantity }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-white">${{ number_format($product->pivot->price, 2) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-[var(--color-store-text)]">${{ number_format($product->pivot->price * $product->pivot->quantity, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="pt-6 border-t border-gray-700">
                        <h4 class="text-lg font-semibold text-white mb-4">Update Order Status</h4>
                        <form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST" class="flex gap-4 items-end">
                            @csrf
                            @method('PATCH')
                            <div class="flex-1">
                                <label for="status" class="block text-sm font-medium text-white mb-2">New Status</label>
                                <select name="status" id="status" class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white focus:border-primary-accent focus:ring focus:ring-primary-accent/50 transition">
                                    <option value="pending" @selected($order->status === 'pending')>Pending</option>
                                    <option value="processing" @selected($order->status === 'processing')>Processing</option>
                                    <option value="shipped" @selected($order->status === 'shipped')>Shipped</option>
                                    <option value="delivered" @selected($order->status === 'delivered')>Delivered</option>
                                    <option value="cancelled" @selected($order->status === 'cancelled')>Cancelled</option>
                                </select>
                            </div>
                            <button type="submit" class="px-6 py-2 bg-[var(--color-store-primary)] text-white rounded-lg font-semibold hover:bg-[#ff5a1a] transition duration-300 btn-animated">
                                Update Status
                            </button>
                        </form>
                    </div>
@endsection
<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <img src="/images/technologia-logo.svg" alt="Technologia Logo" class="h-8 w-auto mr-2" />
            <h2 class="font-semibold text-2xl text-white leading-tight">
                {{ __('My Orders') }}
            </h2>
        </div>
    </x-slot>

    <div class="pb-12 pt-8 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-[#f0f0f0]">My Orders</h1>
                <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-[#ff4500] text-white rounded-lg font-semibold hover:bg-[#ff5a1a] transition duration-300">
                    Back to Dashboard
                </a>
            </div>

            <div class="border border-gray-700 rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Order ID</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Total</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            @forelse($orders as $order)
                                @php
                                    if (method_exists($orders, 'currentPage')) {
                                        $index = ($orders->currentPage() - 1) * $orders->perPage() + $loop->iteration;
                                    } else {
                                        $index = $loop->iteration;
                                    }
                                @endphp
                                <tr class="hover:bg-gray-800 transition">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-primary-accent">{{ $index }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">{{ $order->created_at->format('M d, Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if (in_array($order->status, ['completed', 'shipped', 'delivered']))
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-900/30 text-green-300 border border-green-700">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        @elseif ($order->status === 'cancelled')
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-900/30 text-red-300 border border-red-700">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        @else 
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-900/30 text-yellow-300 border border-yellow-700">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-[var(--color-store-text)]">${{ number_format($order->total_price, 2) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('orders.show', $order->id) }}" class="text-primary-accent hover:text-white transition">View Details</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-8 px-6 text-center text-gray-400 italic">No orders found. Start shopping!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

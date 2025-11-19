@extends('admin.admin_layout')

@section('title', 'Admin Dashboard | System Overview')

@section('content')
    <div class="pb-12 pt-8 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <a href="{{ url('/') }}" class="px-4 py-2 bg-gray-700 text-white rounded-lg font-semibold hover:bg-gray-600 transition duration-300 inline-flex items-center">
                    ← Back to Home
                </a>
            </div>
            <h1 class="text-4xl font-extrabold text-[var(--color-store-text)] mb-8 tracking-tight">
                System Overview
            </h1>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                <!-- Stat Card 1: Total Orders -->
                <div class="card-tech border border-primary-accent/50 p-6 bg-gradient-to-br from-blue-900/30 to-blue-800/30">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs uppercase tracking-widest text-white font-semibold">Total Orders</p>
                            <p class="text-4xl font-bold text-[var(--color-store-text)] mt-2">{{ $totalOrders }}</p>
                        </div>
                        <svg class="w-12 h-12 text-blue-400 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                </div>

                <!-- Stat Card 2: Total Revenue -->
                <div class="card-tech border border-primary-accent/50 p-6 bg-gradient-to-br from-green-900/30 to-green-800/30">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs uppercase tracking-widest text-white font-semibold">Completed Revenue</p>
                            <p class="text-4xl font-bold text-[var(--color-store-text)] mt-2">${{ number_format($totalRevenue, 2) }}</p>
                        </div>
                        <svg class="w-12 h-12 text-green-400 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                </div>

                <!-- Stat Card 3: Total Products -->
                <div class="card-tech border border-primary-accent/50 p-6 bg-gradient-to-br from-yellow-900/30 to-yellow-800/30">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs uppercase tracking-widest text-white font-semibold">Total Products</p>
                            <p class="text-4xl font-bold text-[var(--color-store-text)] mt-2">{{ $totalProducts }}</p>
                        </div>
                        <svg class="w-12 h-12 text-yellow-400 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m0 0l8 4m-8-4v10l8 4m0-10l8 4m-8-4v10M7 11l5 2.5m5-2.5l-5 2.5"/></svg>
                    </div>
                </div>

                <!-- Stat Card 4: Total Users -->
                <div class="card-tech border border-primary-accent/50 p-6 bg-gradient-to-br from-purple-900/30 to-purple-800/30">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs uppercase tracking-widest text-white font-semibold">Total Regular Users</p>
                            <p class="text-4xl font-bold text-[var(--color-store-text)] mt-2">{{ $totalUsers }}</p>
                        </div>
                        <svg class="w-12 h-12 text-purple-400 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 8.048M7 14H5a2 2 0 00-2 2v4h16v-4a2 2 0 00-2-2h-2m-4 4v4m0 0h4m-4 0h-4"/></svg>
                    </div>
                </div>
            </div>

            <!-- Recent Orders Table -->
            <div class="card-tech border border-gray-700 overflow-hidden">
                <div class="p-6 border-b border-gray-700">
                    <h3 class="text-2xl font-bold text-[var(--color-store-text)]">Recent Orders (Last 5)</h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Order ID</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Customer</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Total</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            @foreach($recentOrders as $order)
                                @php
                                    $index = $loop->iteration;
                                    $customerName = optional($order->user)->name ?? ('User #' . $order->user_id);
                                @endphp
                                <tr class="hover:bg-gray-800 transition">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">#{{ $order->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-[var(--color-store-text)]">{{ $customerName }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($order->status === 'completed')
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-900/30 text-green-300 border border-green-700">
                                                {{ $order->status }}
                                            </span>
                                        @elseif($order->status === 'pending')
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-900/30 text-yellow-300 border border-yellow-700">
                                                {{ $order->status }}
                                            </span>
                                        @else
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-700 text-gray-300">
                                                {{ $order->status ?? 'pending' }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-[var(--color-store-text)]">${{ number_format($order->total_price, 2) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <a href="{{ route('admin.orders.show', $order->id) }}" class="text-white hover:text-[var(--color-store-primary)] font-semibold transition">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
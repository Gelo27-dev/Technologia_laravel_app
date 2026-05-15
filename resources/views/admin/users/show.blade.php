@extends('admin.admin_layout')

@section('title', 'User Details - ' . $user->name)

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.users.index') }}" class="text-[var(--color-store-primary)] hover:text-white transition">
            ← Back to Users
        </a>
    </div>

    <div class="card-tech border border-gray-700 p-8">
        <div class="flex justify-between items-start mb-6">
            <div>
                <h1 class="text-2xl font-bold text-white mb-2">{{ $user->name }}</h1>
                <p class="text-gray-400">{{ $user->email }}</p>
            </div>
            <div class="flex items-center space-x-4">
                <span class="px-3 py-1 rounded-full text-sm font-medium
                    {{ $user->active ? 'bg-green-900 text-green-300' : 'bg-red-900 text-red-300' }}">
                    {{ $user->active ? 'Active' : 'Inactive' }}
                </span>
                <span class="px-3 py-1 rounded-full text-sm font-medium
                    {{ $user->is_admin ? 'bg-indigo-900 text-indigo-300' : 'bg-gray-900 text-gray-300' }}">
                    {{ $user->is_admin ? 'Admin' : 'User' }}
                </span>
                <form method="POST" action="{{ route('admin.users.toggleActive', $user) }}" class="inline">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="px-4 py-2 rounded text-sm font-medium transition
                        {{ $user->active
                            ? 'bg-red-600 hover:bg-red-700 text-white'
                            : 'bg-green-600 hover:bg-green-700 text-white' }}">
                        {{ $user->active ? 'Deactivate' : 'Activate' }}
                    </button>
                </form>
                @if ($user->id !== auth()->id())
                    <form method="POST" action="{{ route('admin.users.toggleAdmin', $user) }}" class="inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="px-4 py-2 rounded text-sm font-medium transition
                            {{ $user->is_admin ? 'bg-yellow-600 hover:bg-yellow-700 text-white' : 'bg-indigo-600 hover:bg-indigo-700 text-white' }}">
                            {{ $user->is_admin ? 'Remove Admin' : 'Make Admin' }}
                        </button>
                    </form>
                @endif
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-4">
                <div>
                    <h3 class="text-lg font-semibold text-white mb-2">Account Information</h3>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-gray-400">User ID:</span>
                            <span class="text-white">{{ $user->id }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Role:</span>
                            <span class="text-white">{{ $user->is_admin ? 'Admin' : 'User' }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Email Verified:</span>
                            <span class="text-white">{{ $user->email_verified_at ? 'Yes' : 'No' }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Registered:</span>
                            <span class="text-white">{{ $user->created_at->format('M d, Y H:i') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Last Updated:</span>
                            <span class="text-white">{{ $user->updated_at->format('M d, Y H:i') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-4">
                <div>
                    <h3 class="text-lg font-semibold text-white mb-2">Order Statistics</h3>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-gray-400">Total Orders:</span>
                            <span class="text-white">{{ $user->orders->count() }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Completed Orders:</span>
                            <span class="text-white">{{ $user->orders->where('status', 'completed')->count() }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-400">Total Spent:</span>
                            <span class="text-white">${{ number_format($user->orders->where('status', 'completed')->sum('total_price'), 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($user->orders->count() > 0)
            <div class="mt-8">
                <h3 class="text-lg font-semibold text-white mb-4">Recent Orders</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-semibold uppercase tracking-wider">Order ID</th>
                                <th class="px-4 py-2 text-left text-xs font-semibold uppercase tracking-wider">Date</th>
                                <th class="px-4 py-2 text-left text-xs font-semibold uppercase tracking-wider">Status</th>
                                <th class="px-4 py-2 text-left text-xs font-semibold uppercase tracking-wider">Total</th>
                                <th class="px-4 py-2 text-left text-xs font-semibold uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700">
                            @foreach($user->orders->take(5) as $order)
                                <tr class="hover:bg-gray-800 transition">
                                    <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-white">#{{ $order->id }}</td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-white">{{ $order->created_at->format('M d, Y') }}</td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm">
                                        <span class="px-2 py-1 rounded-full text-xs font-medium
                                            @if($order->status === 'completed') bg-green-900 text-green-300
                                            @elseif($order->status === 'pending') bg-yellow-900 text-yellow-300
                                            @elseif($order->status === 'cancelled') bg-red-900 text-red-300
                                            @else bg-gray-900 text-gray-300 @endif">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-white">${{ number_format($order->total_price, 2) }}</td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('admin.orders.show', $order) }}" class="text-[var(--color-store-primary)] hover:text-white transition">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if($user->orders->count() > 5)
                    <div class="mt-4 text-center">
                        <a href="{{ route('admin.orders.index') }}?user={{ $user->id }}" class="text-[var(--color-store-primary)] hover:text-white transition">
                            View all orders for this user
                        </a>
                    </div>
                @endif
            </div>
        @endif
    </div>
@endsection
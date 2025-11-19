@extends('admin.admin_layout')

@section('title', 'User Management')

@section('content')
            @if ($users->isEmpty())
                <div class="card-tech border border-gray-700 p-8 text-center">
                    <p class="text-white italic">No users found.</p>
                </div>
            @else
                <div class="card-tech border border-gray-700 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white">Registered</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-700">
                                @foreach ($users as $user)
                                    @php
                                        if (method_exists($users, 'currentPage')) {
                                            $index = ($users->currentPage() - 1) * $users->perPage() + $loop->iteration;
                                        } else {
                                            $index = $loop->iteration;
                                        }
                                    @endphp
                                    <tr class="hover:bg-gray-800 transition">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-white">{{ $index }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[var(--color-store-text)]">{{ $user->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-white">{{ $user->email }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-white">{{ $user->created_at->format('M d, Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            <span class="px-2 py-1 rounded-full text-xs font-medium
                                                {{ $user->active ? 'bg-green-900 text-green-300' : 'bg-red-900 text-red-300' }}">
                                                {{ $user->active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-4">
                                            <a href="{{ route('admin.users.show', $user) }}" class="text-[var(--color-store-primary)] hover:text-white transition">View</a>
                                            <form method="POST" action="{{ route('admin.users.toggleActive', $user) }}" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="text-sm transition
                                                    {{ $user->active
                                                        ? 'text-red-400 hover:text-red-300'
                                                        : 'text-green-400 hover:text-green-300' }}">
                                                    {{ $user->active ? 'Deactivate' : 'Activate' }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="mt-6">
                    {{ $users->links() }}
                </div>
            @endif
@endsection
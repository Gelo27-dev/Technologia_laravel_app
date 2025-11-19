<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Product Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[var(--color-store-secondary)] overflow-hidden shadow-sm sm:rounded-lg border border-gray-700">
                <div class="p-6 text-[var(--color-store-text)]">

                    <div class="flex justify-end mb-4">
                        <a href="{{ route('admin.products.create') }}">
                            <x-primary-button>
                                {{ __('Add New Product') }}
                            </x-primary-button>
                        </a>
                    </div>

                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-900/30 text-green-300 rounded-lg border border-green-700">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-transparent border border-gray-700">
                            <thead class="bg-gray-800">
                                <tr>
                                    <th class="py-2 px-4 border-b text-left">Name</th>
                                    <th class="py-2 px-4 border-b text-left">Category</th>
                                    <th class="py-2 px-4 border-b text-left">Price</th>
                                    <th class="py-2 px-4 border-b text-left">Stock</th>
                                    <th class="py-2 px-4 border-b text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr class="hover:bg-gray-900/30 transition">
                                        <td class="py-2 px-4 border-b text-[var(--color-store-text)]">{{ $product->name }}</td>
                                        <td class="py-2 px-4 border-b text-[var(--color-store-text-muted)]">{{ $product->category->name ?? 'N/A' }}</td>
                                        <td class="py-2 px-4 border-b text-[var(--color-store-text)]">${{ number_format($product->price, 2) }}</td>
                                        <td class="py-2 px-4 border-b text-[var(--color-store-text)]">{{ $product->stock }}</td>
                                        <td class="py-2 px-4 border-b">
                                            @if ($product->image)
                                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-16 h-16 object-cover inline-block mr-2" />
                                            @endif
                                            <a href="{{ route('admin.products.show', $product->id) }}" class="text-blue-400 hover:text-blue-300 mr-2">View Details</a>
                                            <a href="{{ route('admin.products.edit', $product->id) }}" class="text-[var(--color-store-primary)] hover:opacity-80 mr-2">Edit</a>
                                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-400 hover:text-red-600">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="py-4 px-4 border-b text-center">No products found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-4">
                        {{ $products->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

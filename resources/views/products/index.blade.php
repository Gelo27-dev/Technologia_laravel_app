<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white leading-tight">
            {{ __('Product Management') }}
        </h2>
    </x-slot>

    <div class="pb-12 pt-8 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card-tech overflow-hidden border border-gray-700">
                <div class="p-8">

                    <div class="flex justify-end mb-6">
                        <a href="{{ route('admin.products.create') }}">
                            <button class="btn-primary btn-animated">
                                {{ __('+ Add New Product') }}
                            </button>
                        </a>
                    </div>

                    @if (session('success'))
                        <div class="mb-6 p-4 bg-green-900/30 border border-green-700 text-green-300 rounded-lg">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="py-3 px-6 text-left text-sm font-semibold uppercase tracking-wider">Name</th>
                                    <th class="py-3 px-6 text-left text-sm font-semibold uppercase tracking-wider">Category</th>
                                    <th class="py-3 px-6 text-left text-sm font-semibold uppercase tracking-wider">Price</th>
                                    <th class="py-3 px-6 text-left text-sm font-semibold uppercase tracking-wider">Stock</th>
                                    <th class="py-3 px-6 text-left text-sm font-semibold uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr class="border-b border-gray-700 hover:bg-gray-800 transition">
                                        <td class="py-4 px-6 text-[var(--color-store-text)]">{{ $product->name }}</td>
                                        <td class="py-4 px-6 text-gray-400">{{ $product->category->name ?? 'N/A' }}</td>
                                        <td class="py-4 px-6 text-[var(--color-store-text)] font-semibold">${{ number_format($product->price, 2) }}</td>
                                        <td class="py-4 px-6">
                                            @if($product->stock > 10)
                                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-900/30 text-green-300 border border-green-700">{{ $product->stock }} in stock</span>
                                            @elseif($product->stock > 0)
                                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-yellow-900/30 text-yellow-300 border border-yellow-700">{{ $product->stock }} low stock</span>
                                            @else
                                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-red-900/30 text-red-300 border border-red-700">Out of stock</span>
                                            @endif
                                        </td>
                                        <td class="py-4 px-6 space-x-3">
                                            <a href="{{ route('admin.products.edit', $product->id) }}" class="text-primary-accent hover:text-white font-semibold text-sm transition">Edit</a>
                                            
                                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-400 hover:text-red-300 font-semibold text-sm transition">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="py-8 px-6 text-center text-gray-400">No products found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-6 text-gray-400">
                        {{ $products->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
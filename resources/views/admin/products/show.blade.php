@extends('admin.admin_layout')

@section('title', 'Product Details: ' . $product->name)

@section('content')
    <div style="max-width: 800px;">

        <div class="mb-6">
            <a href="{{ route('admin.products.index') }}" class="text-white hover:text-gray-300 font-semibold transition flex items-center group">
                <svg class="w-4 h-4 mr-2 group-hover:-translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
                {{ __('Back to Products') }}
            </a>
        </div>

        <div class="bg-gray-800 border border-gray-700 rounded-lg p-6 space-y-6">

            <div class="flex items-start justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-white mb-2">{{ $product->name }}</h1>
                    <p class="text-gray-400">Product ID: {{ $product->id }}</p>
                </div>
                <div class="flex space-x-3">
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition duration-300">
                        Edit Product
                    </a>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this product?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg font-semibold hover:bg-red-700 transition duration-300">
                            Delete Product
                        </button>
                    </form>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-1">Category</label>
                        <p class="text-white">{{ $product->category->name ?? 'No category assigned' }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-1">Price</label>
                        <p class="text-white text-xl font-semibold">${{ number_format($product->price, 2) }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-1">Stock Quantity</label>
                        <p class="text-white">{{ $product->stock }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-1">Created At</label>
                        <p class="text-white">{{ $product->created_at->format('M d, Y H:i') }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-1">Last Updated</label>
                        <p class="text-white">{{ $product->updated_at->format('M d, Y H:i') }}</p>
                    </div>
                </div>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-1">Description</label>
                        <div class="text-white bg-gray-900 border border-gray-600 rounded-lg p-4 min-h-[120px]">
                            @if($product->description)
                                {{ $product->description }}
                            @else
                                <span class="text-gray-500 italic">No description provided</span>
                            @endif
                        </div>
                    </div>

                    @if ($product->image)
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-1">Product Image</label>
                            <div class="bg-gray-900 border border-gray-600 rounded-lg p-4">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full max-w-xs h-auto object-cover rounded border border-gray-600" />
                            </div>
                        </div>
                    @else
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-1">Product Image</label>
                            <div class="bg-gray-900 border border-gray-600 rounded-lg p-4 text-center">
                                <span class="text-gray-500 italic">No image uploaded</span>
                            </div>
                        </div>
                    @endif
                </div>

            </div>

        </div>

    </div>
@endsection
@extends('admin.admin_layout')

@section('title', 'Edit Product: ' . $product->name)

@section('content')
    <div style="max-width: 600px;">

                    @if ($errors->any())
                        <div class="mb-6 p-4 bg-red-900/30 border border-red-700 rounded-lg">
                            <ul class="list-disc list-inside text-sm text-red-300 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="name" class="block text-sm font-medium text-white mb-2">{{ __('Product Name') }}</label>
                            <input id="name" type="text" name="name" value="{{ old('name', $product->name) }}" 
                                class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:border-primary-accent focus:ring focus:ring-primary-accent/50 transition" 
                                required autofocus />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="category_id" class="block text-sm font-medium text-white mb-2">{{ __('Category') }}</label>
                                <select name="category_id" id="category_id" 
                                    class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white focus:border-primary-accent focus:ring focus:ring-primary-accent/50 transition">
                                    <option value="">Select a category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="price" class="block text-sm font-medium text-white mb-2">{{ __('Price ($)') }}</label>
                                <input id="price" type="number" name="price" value="{{ old('price', $product->price) }}" 
                                    class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:border-primary-accent focus:ring focus:ring-primary-accent/50 transition" 
                                    required step="0.01" />
                            </div>
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-white mb-2">{{ __('Description') }}</label>
                            <textarea id="description" name="description" rows="4" 
                                class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:border-primary-accent focus:ring focus:ring-primary-accent/50 transition">{{ old('description', $product->description) }}</textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="stock" class="block text-sm font-medium text-white mb-2">{{ __('Stock Quantity') }}</label>
                                <input id="stock" type="number" name="stock" value="{{ old('stock', $product->stock) }}" 
                                    class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:border-primary-accent focus:ring focus:ring-primary-accent/50 transition" 
                                    required />
                            </div>

                            <div>
                                <label for="image" class="block text-sm font-medium text-white mb-2">{{ __('Product Image') }}</label>
                                <input id="image" name="image" type="file" accept="image/*"
                                    class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white file:bg-[#ff6a00] file:text-white file:border-0 file:rounded file:px-4 file:py-2 file:font-semibold file:cursor-pointer hover:file:bg-[#ff4500] transition" />
                            </div>
                        </div>

                        @if ($product->image && \Storage::disk('public')->exists($product->image))
                            <div class="p-4 bg-gray-800 border border-gray-700 rounded-lg">
                                <p class="text-sm text-white mb-3">Current Image:</p>
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-32 h-32 object-cover rounded border border-gray-600" />
                            </div>
                        @endif

                        <div class="pt-6 border-t border-gray-700 flex items-center justify-between">
                            <a href="{{ route('admin.products.index') }}" class="text-white hover:text-gray-300 font-semibold transition flex items-center group">
                                <svg class="w-4 h-4 mr-2 group-hover:-translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/></svg>
                                {{ __('Cancel') }}
                            </a>
                            <button type="submit" class="px-8 py-3 bg-[var(--color-store-primary)] text-white rounded-lg font-semibold hover:bg-[#ff5a1a] transition duration-300 btn-animated shadow-lg">
                                {{ __('Update Product') }} ✓
                            </button>
                        </div>
                    </form>
    </div>
@endsection

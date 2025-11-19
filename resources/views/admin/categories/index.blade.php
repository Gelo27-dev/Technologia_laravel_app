@extends('admin.admin_layout')

@section('title', 'Category Management')

@section('content')
    <div class="pb-12 pt-8 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Status Messages --}}
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-900/30 text-green-300 rounded-lg border border-green-700 font-medium shadow-sm">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="mb-4 bg-red-900/30 border border-red-700 text-red-300 px-4 py-3 rounded relative font-medium shadow-sm">
                    <h4 class="font-bold mb-1">Validation Errors:</h4>
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                {{-- COLUMN 1: ADD NEW CATEGORY FORM (Small form) --}}
                <div class="bg-[var(--color-store-secondary)] overflow-hidden shadow-xl sm:rounded-lg md:col-span-1 h-fit border border-gray-700">
                    <div class="p-6 text-[var(--color-store-text)]">
                        <h3 class="text-xl font-bold text-white mb-6 border-b border-gray-700 pb-2">Add New Category</h3>
                        
                        {{-- Ensure correct admin route: 'admin.categories.store' --}}
                        <form action="{{ route('admin.categories.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-white mb-2">{{ __('Category Name') }}</label>
                                <input id="name" type="text" name="name" value="{{ old('name') }}"
                                    class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:border-primary-accent focus:ring focus:ring-primary-accent/50 transition"
                                    placeholder="e.g., Laptops" required autofocus />
                            </div>

                            <div class="mb-4">
                                <label for="description" class="block text-sm font-medium text-white mb-2">{{ __('Description') }}</label>
                                <textarea id="description" name="description" rows="3"
                                    class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:border-primary-accent focus:ring focus:ring-primary-accent/50 transition"
                                    placeholder="Optional description...">{{ old('description') }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label for="parent_id" class="block text-sm font-medium text-white mb-2">{{ __('Parent Category') }}</label>
                                <select id="parent_id" name="parent_id"
                                    class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white focus:border-primary-accent focus:ring focus:ring-primary-accent/50 transition">
                                    <option value="">-- No Parent (Top Level) --</option>
                                    @foreach(\App\Models\Category::active()->parents()->get() as $parentCategory)
                                        <option value="{{ $parentCategory->id }}" {{ old('parent_id') == $parentCategory->id ? 'selected' : '' }}>
                                            {{ $parentCategory->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <p class="text-xs text-gray-400 mt-1">Leave empty for top-level categories</p>
                            </div>

                            <div class="mb-4">
                                <label for="icon" class="block text-sm font-medium text-white mb-2">{{ __('Icon (Emoji)') }}</label>
                                <input id="icon" type="text" name="icon" value="{{ old('icon') }}"
                                    class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:border-primary-accent focus:ring focus:ring-primary-accent/50 transition"
                                    placeholder="e.g., 💻" />
                                <p class="text-xs text-gray-400 mt-1">Optional emoji or icon for the category</p>
                            </div>

                            <div class="mb-4">
                                <label class="flex items-center">
                                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                                        class="rounded border-gray-600 text-[var(--color-store-primary)] focus:ring-[var(--color-store-primary)]">
                                    <span class="ml-2 text-sm font-medium text-white">Active</span>
                                </label>
                                <p class="text-xs text-gray-400 mt-1">Inactive categories won't be shown in the shop</p>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <button type="submit" class="px-6 py-2 bg-[var(--color-store-primary)] text-white rounded-lg font-semibold hover:bg-[#ff5a1a] transition duration-300 btn-animated">
                                    {{ __('Save Category') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- COLUMN 2: EXISTING CATEGORIES TABLE (Takes more space) --}}
                <div class="bg-[var(--color-store-secondary)] overflow-hidden shadow-xl sm:rounded-lg md:col-span-2 border border-gray-700">
                    <div class="p-6 text-[var(--color-store-text)]">
                        <h3 class="text-xl font-bold text-white mb-6 border-b border-gray-700 pb-2">Existing Categories</h3>

                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-700">
                                <thead class="bg-gray-800">
                                    <tr>
                                        <th class="py-3 px-4 text-left text-xs font-medium text-white uppercase tracking-wider">Category</th>
                                        <th class="py-3 px-4 text-left text-xs font-medium text-white uppercase tracking-wider">Type</th>
                                        <th class="py-3 px-4 text-left text-xs font-medium text-white uppercase tracking-wider">Status</th>
                                        <th class="py-3 px-4 text-left text-xs font-medium text-white uppercase tracking-wider">Products</th>
                                        <th class="py-3 px-4 text-left text-xs font-medium text-white uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-700">
                                    @php
                                        $allCategories = \App\Models\Category::with(['parent', 'children', 'products'])->get()->sortBy('full_name');
                                    @endphp
                                    @forelse ($allCategories as $category)
                                        <tr class="hover:bg-gray-900/30 transition {{ $category->parent_id ? 'bg-gray-900/20' : '' }}">
                                            <td class="py-3 px-4 text-sm text-white">
                                                <div class="flex items-center gap-2">
                                                    @if($category->icon)
                                                        <span class="text-lg">{{ $category->icon }}</span>
                                                    @endif
                                                    <div>
                                                        <div class="font-medium">{{ $category->name }}</div>
                                                        @if($category->parent)
                                                            <div class="text-xs text-gray-400">Child of: {{ $category->parent->name }}</div>
                                                        @endif
                                                        @if($category->description)
                                                            <div class="text-xs text-gray-500 mt-1">{{ Str::limit($category->description, 50) }}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="py-3 px-4 whitespace-nowrap text-sm text-white">
                                                @if($category->parent_id)
                                                    <span class="px-2 py-1 bg-blue-900/30 text-blue-300 rounded-full text-xs">Subcategory</span>
                                                @else
                                                    <span class="px-2 py-1 bg-green-900/30 text-green-300 rounded-full text-xs">Parent</span>
                                                @endif
                                                @if($category->children->count() > 0)
                                                    <div class="text-xs text-gray-400 mt-1">{{ $category->children->count() }} subcategories</div>
                                                @endif
                                            </td>
                                            <td class="py-3 px-4 whitespace-nowrap text-sm">
                                                @if($category->is_active)
                                                    <span class="px-2 py-1 bg-green-900/30 text-green-300 rounded-full text-xs border border-green-700">Active</span>
                                                @else
                                                    <span class="px-2 py-1 bg-red-900/30 text-red-300 rounded-full text-xs border border-red-700">Inactive</span>
                                                @endif
                                            </td>
                                            <td class="py-3 px-4 text-sm text-white">
                                                <div class="font-bold">{{ $category->products->count() }} products</div>
                                                @if($category->products->count() > 0)
                                                    <div class="flex flex-wrap gap-1 mt-1">
                                                        @foreach ($category->products->take(3) as $product)
                                                            <div class="flex items-center gap-1 bg-gray-900 rounded px-2 py-1">
                                                                @if ($product->image)
                                                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-4 h-4 object-cover rounded border border-gray-700" />
                                                                @else
                                                                    <span class="w-4 h-4 flex items-center justify-center bg-gray-700 rounded text-xs text-white">?</span>
                                                                @endif
                                                                <span class="text-xs text-white">{{ Str::limit($product->name, 15) }}</span>
                                                            </div>
                                                        @endforeach
                                                        @if($category->products->count() > 3)
                                                            <span class="text-xs text-gray-400">+{{ $category->products->count() - 3 }} more</span>
                                                        @endif
                                                    </div>
                                                @endif
                                            </td>
                                            <td class="py-3 px-4 whitespace-nowrap text-sm font-medium space-x-3">

                                                {{-- EDIT LINK --}}
                                                <a href="{{ route('admin.categories.edit', $category) }}" class="text-white hover:text-[var(--color-store-primary)] transition duration-150 ease-in-out">Edit</a>

                                                {{-- TOGGLE ACTIVE/INACTIVE --}}
                                                <form action="{{ route('admin.categories.toggle-active', $category) }}" method="POST" class="inline-block">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="text-yellow-400 hover:text-yellow-600 transition duration-150 ease-in-out focus:outline-none text-xs">
                                                        {{ $category->is_active ? 'Deactivate' : 'Activate' }}
                                                    </button>
                                                </form>

                                                {{-- DELETE BUTTON --}}
                                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline-block" onsubmit="return confirm('WARNING: Are you sure you want to delete {{ $category->name }}? This will also delete all subcategories and may affect products.');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-400 hover:text-red-600 transition duration-150 ease-in-out focus:outline-none">Delete</button>
                                                </form>

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="py-4 px-4 text-center text-[var(--color-store-text-muted)] italic">No categories found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>


        </div>
    </div>
@endsection
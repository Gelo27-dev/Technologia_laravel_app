<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="pb-12 pt-8 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <div class="card-tech overflow-hidden border border-gray-700">
                    <div class="p-8">
                        <h3 class="text-xl font-bold text-[var(--color-store-text)] mb-6 border-b border-gray-700 pb-2">Add New Category</h3>

                        @if ($errors->any())
                            <div class="mb-4 p-4 bg-red-900/30 border border-red-700 rounded-lg">
                                <ul class="list-disc list-inside text-sm text-red-300 space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="mb-4 p-4 bg-green-900/30 border border-green-700 text-green-300 rounded-lg">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('categories.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-300 mb-2">{{ __('Category Name') }}</label>
                                <input id="name" type="text" name="name" value="{{ old('name') }}"
                                    class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:border-primary-accent focus:ring focus:ring-primary-accent/50 transition"
                                    placeholder="e.g., Processors, Graphics Cards" required autofocus />
                            </div>
                            <button type="submit" class="btn-primary w-full py-2">
                                {{ __('Save Category') }}
                            </button>
                        </form>
                    </div>
                </div>

                <div class="card-tech overflow-hidden border border-gray-700">
                    <div class="p-8">
                        <h3 class="text-xl font-bold text-[var(--color-store-text)] mb-6 border-b border-gray-700 pb-2">Existing Categories</h3>

                        <div class="overflow-x-auto">
                            <table class="min-w-full">
                                <thead class="bg-gray-800 text-white">
                                    <tr>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider">Name</th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider">Products</th>
                                        <th class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-700">
                                    @forelse ($categories as $category)
                                        <tr class="hover:bg-gray-800 transition">
                                            <td class="py-3 px-4 whitespace-nowrap text-sm font-medium text-[var(--color-store-text)]">{{ $category->name }}</td>
                                            <td class="py-3 px-4 whitespace-nowrap text-sm text-gray-400">
                                                <span class="px-2 py-1 bg-gray-700 rounded text-gray-300">{{ $category->products_count }}</span>
                                            </td>
                                            <td class="py-3 px-4 whitespace-nowrap text-sm">
                                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure? This will not delete products.');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-400 hover:text-red-300 font-semibold transition">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="py-8 px-4 text-center text-gray-400 italic">No categories found.</td>
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
</x-app-layout>

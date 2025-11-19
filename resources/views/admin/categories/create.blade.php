@extends('admin.admin_layout')

@section('title', 'Create Category')

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

            <div class="bg-[var(--color-store-secondary)] overflow-hidden shadow-xl sm:rounded-lg border border-gray-700">
                <div class="p-6 text-[var(--color-store-text)]">
                    <h3 class="text-xl font-bold text-white mb-6 border-b border-gray-700 pb-2">Create New Category</h3>

                    <form action="{{ route('admin.categories.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-white mb-2">{{ __('Category Name') }}</label>
                            <input id="name" type="text" name="name" value="{{ old('name') }}"
                                class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:border-primary-accent focus:ring focus:ring-primary-accent/50 transition"
                                placeholder="e.g., Electronics" required autofocus />
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-white mb-2">{{ __('Description') }}</label>
                            <textarea id="description" name="description" rows="3"
                                class="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:border-primary-accent focus:ring focus:ring-primary-accent/50 transition"
                                placeholder="Optional description...">{{ old('description') }}</textarea>
                        </div>
                        <div class="flex items-center justify-between mt-6">
                            <a href="{{ route('admin.categories.index') }}" class="text-gray-400 hover:text-white transition">Cancel</a>
                            <button type="submit" class="px-6 py-2 bg-[var(--color-store-primary)] text-white rounded-lg font-semibold hover:bg-[#ff5a1a] transition duration-300 btn-animated">
                                {{ __('Create Category') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
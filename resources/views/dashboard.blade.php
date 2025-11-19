<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="pb-12 pt-8 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Card -->
            <div class="card-tech border border-gray-700 p-8 mb-8">
                <h3 class="text-2xl font-bold text-[var(--color-store-text)] mb-2">
                    Welcome back, {{ Auth::user()->name }}! 👋
                </h3>
                <p class="text-gray-400">
                    Ready to build your next PC? Browse our latest components and find everything you need for your next upgrade.
                </p>
                <a href="{{ route('shop.index') }}" class="btn-primary mt-6 inline-block">
                    Shop Components →
                </a>
            </div>

            <!-- Quick Links -->
            <div class="card-tech border border-gray-700 p-8">
                <h3 class="text-xl font-bold text-[var(--color-store-text)] mb-6">Quick Links</h3>
                <div class="space-y-3">
                    <a href="{{ route('shop.index') }}" class="flex items-center p-3 hover:bg-gray-800 rounded-lg transition border border-gray-700 hover:border-primary-accent">
                        <svg class="w-5 h-5 text-primary-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                        <span class="text-[var(--color-store-text)] font-medium">Browse Components</span>
                        <svg class="w-4 h-4 ml-auto text-gray-400 group-hover:text-primary-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>

                    <a href="{{ route('orders.index') }}" class="flex items-center p-3 hover:bg-gray-800 rounded-lg transition border border-gray-700 hover:border-primary-accent">
                        <svg class="w-5 h-5 text-primary-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        <span class="text-[var(--color-store-text)] font-medium">My Orders</span>
                        <svg class="w-4 h-4 ml-auto text-gray-400 group-hover:text-primary-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>

                    <a href="{{ route('profile.edit') }}" class="flex items-center p-3 hover:bg-gray-800 rounded-lg transition border border-gray-700 hover:border-primary-accent">
                        <svg class="w-5 h-5 text-primary-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        <span class="text-[var(--color-store-text)] font-medium">Edit Profile</span>
                        <svg class="w-4 h-4 ml-auto text-gray-400 group-hover:text-primary-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>

                    <a href="{{ route('cart.index') }}" class="flex items-center p-3 hover:bg-gray-800 rounded-lg transition border border-gray-700 hover:border-primary-accent">
                        <svg class="w-5 h-5 text-primary-accent mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        <span class="text-[var(--color-store-text)] font-medium">View Cart</span>
                        <svg class="w-4 h-4 ml-auto text-gray-400 group-hover:text-primary-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

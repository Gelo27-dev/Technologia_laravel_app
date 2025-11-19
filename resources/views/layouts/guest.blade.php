<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        {!! NoCaptcha::renderJs() !!}
    </head>
    <body class="font-sans text-[#f0f0f0] antialiased bg-[#0d0d0d]">
        
        <!-- START: GLOBAL NAVIGATION BAR -->
        <nav x-data="{ open: false }" class="bg-[#1a1a1a] border-b border-gray-700 shadow-md">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Technologia Logo -->
                        <div class="shrink-0 flex items-center mr-6">
                            <a href="{{ route('shop.index') }}" class="flex items-center space-x-2">
                                <img src="{{ asset('images/technologia-logo.svg') }}" alt="Technologia Logo" class="h-8 w-auto">
                                <span class="text-lg font-bold text-[#ff4500]">Technologia</span>
                            </a>
                        </div>
                        <!-- Home Link -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ url('/') }}" class="text-sm font-medium text-[#f0f0f0] hover:text-[#ff4500] transition duration-150">Home</a>
                        </div>
                    </div>

                    <!-- Right Side Navigation Links -->
                    <div class="flex items-center space-x-6">
                        <!-- Favorites Link -->
                        @auth
                            <a href="{{ route('favorites.index') }}" class="text-sm font-medium text-[#f0f0f0] hover:text-[#ff4500] transition duration-150 flex items-center space-x-1">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                                <span>Favorites</span>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-medium text-[#f0f0f0] hover:text-[#ff4500] transition duration-150 flex items-center space-x-1">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                                <span>Favorites</span>
                            </a>
                        @endauth

                        <!-- Cart Link with Count -->
                        <a href="{{ route('cart.index') }}" class="text-sm font-medium text-[#f0f0f0] hover:text-[#ff4500] transition duration-150 flex items-center space-x-1">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            <span class="font-semibold">Cart ({{ Cart::count() }})</span>
                        </a>

                        <!-- Auth Links -->
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-sm font-medium text-[#f0f0f0] hover:text-[#ff4500] transition duration-150">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm font-medium text-[#f0f0f0] hover:text-[#ff4500] transition duration-150">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ms-4 text-sm font-medium text-[#ff4500] hover:text-white transition duration-150">Register</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </nav>
        <!-- END: GLOBAL NAVIGATION BAR -->

        <!-- START: MAIN CONTENT SLOT -->
        <!-- Note: This wrapper is now specifically for the shop/cart pages, giving them width and spacing -->
        <main class="py-8">
            {{ $slot }}
        </main>
        <!-- END: MAIN CONTENT SLOT -->

        <!-- Message Button Component -->
        <x-message-button />

    </body>
</html>
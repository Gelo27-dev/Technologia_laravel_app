<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>My Ecommerce App</title>

    <link rel="icon" href="/favicon.ico">

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/theme.js'])
</head>
<body class="font-sans antialiased theme-dark">
    <div class="min-h-screen" style="background-color:var(--color-store-background); color:var(--color-store-text)">
        <nav x-data="{ open: false }" class="bg-[var(--color-store-secondary)] border-b border-gray-700 text-[var(--color-store-text)]">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('dashboard') }}" class="flex items-center">
                                <img src="/images/technologia-logo.svg" alt="Technologia Logo" class="block h-9 w-auto" />
                                <span class="ms-3 font-semibold text-sm text-white hidden md:inline">Technologia</span>
                            </a>
                        </div>

                        @php
                            $categoriesHref = Route::has('categories.index') ? route('categories.index') : (Route::has('admin.categories.index') ? route('admin.categories.index') : '#');
                            $categoriesActive = request()->routeIs('categories.*') || request()->routeIs('admin.categories.*');
                        @endphp
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link class="nav-link-animated" :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                {{ __('Dashboard') }}
                            </x-nav-link>

                            <x-nav-link class="nav-link-animated" :href="route('shop.index')" :active="request()->routeIs('shop.index')">
                                {{ __('Shop') }}
                            </x-nav-link>
                            <x-nav-link class="nav-link-animated" :href="route('cart.index')" :active="request()->routeIs('cart.index')">
                                {{ __('Cart') }} ({{ Cart::count() }})
                            </x-nav-link>

                            @auth
                                @if (Auth::user()->is_admin === 1)
                                    <x-nav-link class="nav-link-animated" :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                                        {{ __('Admin Dashboard') }}
                                    </x-nav-link>

                                    <x-nav-link class="nav-link-animated" :href="route('admin.products.index')" :active="request()->routeIs('admin.products.*')">
                                        {{ __('Products') }}
                                    </x-nav-link>

                                    <x-nav-link class="nav-link-animated" :href="route('admin.orders.index')" :active="request()->routeIs('admin.orders.*')">
                                        {{ __('Orders') }}
                                    </x-nav-link>

                                    <x-nav-link class="nav-link-animated" :href="$categoriesHref" :active="$categoriesActive">
                                        {{ __('Categories') }}
                                    </x-nav-link>
                                @endif
                            @endauth
                        </div>
                    </div>

                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <div class="me-3">
                            <x-theme-switcher />
                        </div>
                        @auth
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="flex items-center text-sm font-medium text-[var(--color-store-text-muted)] hover:text-[var(--color-store-text)] hover:border-gray-300 focus:outline-none focus:text-[var(--color-store-text)] focus:border-gray-300 transition">
                                        <div>{{ Auth::user()->name }}</div>

                                        <div class="ml-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('profile.edit')">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>

                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        @else
                            <div class="space-x-4">
                                <x-nav-link :href="route('login')" :active="request()->routeIs('login')">{{ __('Log in') }}</x-nav-link>
                                @if (Route::has('register'))
                                     <x-nav-link :href="route('register')" :active="request()->routeIs('register')" class="text-white">{{ __('Register') }}</x-nav-link>
                                @endif
                            </div>
                        @endauth
                    </div>

                    <div class="-mr-2 flex items-center sm:hidden">
                        <button data-navbar-toggle @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-[var(--color-store-text-muted)] hover:text-[var(--color-store-text)] hover:bg-gray-800 focus:outline-none focus:bg-gray-800 focus:text-[var(--color-store-text)]">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div :class="{ 'block': open, 'hidden': ! open }" class="hidden sm:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('shop.index')" :active="request()->routeIs('shop.index')">{{ __('Shop') }}</x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('cart.index')" :active="request()->routeIs('cart.index')">{{ __('Cart') }} ({{ Cart::count() }})</x-responsive-nav-link>

                    @auth
                        @if (Auth::user()->is_admin === 1)
                            <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                                {{ __('Admin Dashboard') }}
                            </x-responsive-nav-link>

                            <x-responsive-nav-link :href="route('admin.products.index')" :active="request()->routeIs('admin.products.*')">
                                {{ __('Products') }}
                            </x-responsive-nav-link>

                            <x-responsive-nav-link :href="route('admin.orders.index')" :active="request()->routeIs('admin.orders.*')">
                                {{ __('Orders') }}
                            </x-responsive-nav-link>

                            <x-responsive-nav-link :href="$categoriesHref" :active="$categoriesActive">
                                {{ __('categories') }}
                            </x-responsive-nav-link>
                        @endif
                    @endauth
                </div>

                @auth
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="px-4">
                            <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <x-responsive-nav-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-responsive-nav-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form>
                        </div>
                    </div>
                @endauth
            </div>
        </nav>

        @if (isset($header))
            <header class="bg-gray-900 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-white">
                    {{ $header }}
                </div>
            </header>
        @endif

        <main>
            @isset($slot)
                {{ $slot }}
            @else
                @yield('content')
            @endisset
        </main>

        <!-- Message Button Component -->
        <x-message-button />
    </div>
</body>
</html>
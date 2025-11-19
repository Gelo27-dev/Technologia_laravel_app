<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Technologia Admin - @yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/theme.js'])

    {{-- Using the new primary color for the SVG icon --}}
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23ff4500'><circle cx='12' cy='12' r='3'/><path d='M19.14,12.94c0.04-0.3,0.06-0.61,0.06-0.94c0-0.32-0.02-0.64-0.07-0.94l2.03-1.58c0.18-0.14,0.23-0.41,0.12-0.61 l-1.92-3.32c-0.12-0.22-0.37-0.29-0.59-0.22l-2.39,0.96c-0.5-0.38-1.03-0.7-1.62-0.94L14.4,2.81c-0.04-0.24-0.24-0.41-0.48-0.41 h-3.84c-0.24,0-0.43,0.17-0.47,0.41L9.25,5.35C8.66,5.59,8.12,5.92,7.63,6.29L5.24,5.33c-0.22-0.08-0.47,0-0.59,0.22L2.74,8.87 C2.62,9.08,2.66,9.34,2.86,9.48l2.03,1.58C4.84,11.36,4.82,11.69,4.82,12s0.02,0.64,0.07,0.94l-2.03,1.58 c-0.18,0.14-0.23,0.41-0.12,0.61l1.92,3.32c0.12,0.22,0.37,0.29,0.59,0.22l2.39-0.96c0.5,0.38,1.03,0.7,1.62,0.94l0.36,2.54 c0.05,0.24,0.24,0.41,0.48,0.41h3.84c0.24,0,0.43-0.17,0.47-0.41l0.36-2.54c0.59-0.24,1.13-0.56,1.62-0.94l2.39,0.96 c0.22,0.08,0.47,0,0.59-0.22l1.92-3.32c0.12-0.22,0.07-0.47-0.12-0.61L19.14,12.94z M12,15.6c-1.98,0-3.6-1.62-3.6-3.6 s1.62-3.6,3.6-3.6s3.6,1.62,3.6,3.6S13.98,15.6,12,15.6z'/></svg>">
    <style>
        :root {
            --color-store-primary: #ff4500;
            --color-store-secondary: #1a1a1a;
            --color-store-background: #0d0d0d;
            --color-store-text: #f0f0f0;
        }
        
        .btn-primary {
            @apply px-4 py-2 bg-[#ff4500] text-white rounded-lg font-semibold hover:bg-[#ff5a1a] transition duration-300;
        }
        
        .card-tech {
            @apply bg-[#1a1a1a] rounded-lg;
        }
        
        html { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="font-sans antialiased theme-dark bg-[#0d0d0d] min-h-screen flex">

    <aside class="w-64 bg-[#1a1a1a] text-[#f0f0f0] p-6 space-y-6 border-r border-gray-700">
        <div class="mb-8">
            <div class="text-4xl text-[#ff4500] mb-2">⚙️</div>
            <h1 class="text-3xl font-bold text-[#ff4500]">Admin</h1>
            <p class="text-xs text-white mt-1">Control Panel</p>
        </div>
        
        <nav class="space-y-2">
            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-3 rounded-lg text-[#f0f0f0] hover:bg-gray-800 hover:border-l-2 hover:border-[#ff4500] transition duration-200 font-medium sidebar-link-animated">
                <svg class="w-5 h-5 inline-block mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 16l4-4m0 0l4 4m-4-4V5"/></svg>
                Dashboard
            </a>
            <a href="{{ route('admin.products.index') }}" class="block px-4 py-3 rounded-lg text-[#f0f0f0] hover:bg-gray-800 hover:border-l-2 hover:border-[#ff4500] transition duration-200 font-medium sidebar-link-animated">
                <svg class="w-5 h-5 inline-block mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m0 0l8 4m-8-4v10l8 4m0-10l8 4m-8-4v10M7 11l5 2.5m5-2.5l-5 2.5"/></svg>
                Products
            </a>
            <a href="{{ route('admin.categories.index') }}" class="block px-4 py-3 rounded-lg text-[#f0f0f0] hover:bg-gray-800 hover:border-l-2 hover:border-[#ff4500] transition duration-200 font-medium sidebar-link-animated">
                <svg class="w-5 h-5 inline-block mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                Categories
            </a>
            <a href="{{ route('admin.orders.index') }}" class="block px-4 py-3 rounded-lg text-[#f0f0f0] hover:bg-gray-800 hover:border-l-2 hover:border-[#ff4500] transition duration-200 font-medium sidebar-link-animated">
                <svg class="w-5 h-5 inline-block mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                Orders
            </a>
            <a href="{{ route('admin.users.index') }}" class="block px-4 py-3 rounded-lg text-[#f0f0f0] hover:bg-gray-800 hover:border-l-2 hover:border-[#ff4500] transition duration-200 font-medium sidebar-link-animated">
                <svg class="w-5 h-5 inline-block mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 8.048M7 14H5a2 2 0 00-2 2v4h16v-4a2 2 0 00-2-2h-2m-4 4v4m0 0h4m-4 0h-4"/></svg>
                Users
            </a>
        </nav>
    </aside>

    <main class="flex-1 p-8">
        <header class="mb-8">
            <h2 class="text-4xl font-extrabold text-[#f0f0f0] tracking-tight">@yield('title')</h2>
        </header>
        
        <section class="bg-[#1a1a1a] border border-gray-700 p-8 rounded-xl shadow-2xl">
            @yield('content')
        </section>
    </main>

</body>
</html>